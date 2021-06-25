<?php

namespace App\Repositories;

use App\Entities\GroupImage;
use App\Entities\ShopImage;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DoctrineGroupImageRepository extends EntityRepository implements GroupImageRepository
{
    private $tableName = "group_image";
    const GROUPS_PER_PAGE = 30;

    public function create(GroupImage $object): GroupImage
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush();
        return $object;
    }


    public function findByImage(int $shopImageId): array
    {
        $imageLink = $this->getEntityManager()->getRepository(ShopImage::class)->findOneBy(['id' => $shopImageId])->getImage();

        $builder = $this->getEntityManager()
            ->getRepository(GroupImage::class)
            ->createQueryBuilder('gi')
            ->distinct()
            ->join(ShopImage::class,
                   'si',
                   'WITH',
                   'gi = si.groupImage')
            ->where('si.image = ?1')
            ->setParameter(1, $imageLink)
        ;

        return $builder->getQuery()->getResult();
    }


    public function getGroupId(): int
    {
        $sql = "SELECT grimg FROM {$this->tableName} order by grimg DESC LIMIT 1";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchOne();
    }

    public function getPagesCnt(int $supplier, bool $showOnlyNew, string $skuFind): int
    {
        if (!empty($skuFind)) {
            return 0;
        } elseif ($showOnlyNew) {
            $sql =
                "
                SELECT COUNT(DISTINCT(si.grimg_id))
                FROM shop_image si
                INNER JOIN supplier s ON s.id = si.postavshik
                WHERE si.grtov_id IS NULL AND si.not_fit = 0 AND s.postavshik='{$supplier}'
                ";
        } else {
            $sql =
                "   SELECT COUNT(DISTINCT si.grimg_id)
                    FROM shop_image si
                    INNER JOIN supplier s ON s.id = si.postavshik
                    WHERE s.postavshik='{$supplier}'
                 ";
        }

        return ceil($this->getEntityManager()->getConnection()->executeQuery($sql)->fetchOne() / self::GROUPS_PER_PAGE);
    }

    /**
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\Exception
     */
    public function getGroups(string $supplier, bool $showOnlyNew, int $pageNumber, string $skuFind): array
    {
        $limit = 30;
        $start = ($pageNumber - 1) * $limit;

        if (!empty($skuFind)) {
            $sqlGrimgs =
                "
                SELECT si.grimg_id AS grimg
                FROM shop_image si
                WHERE si.artikul='{$skuFind}'
                UNION
                SELECT gt.grimg
                FROM group_product gt
                WHERE gt.grtov_sku='{$skuFind}'
                ";
        } elseif ($showOnlyNew) {
            $sqlGrimgs =
                "
                SELECT DISTINCT(si.grimg_id) as grimg
                FROM shop_image si
                INNER JOIN supplier s ON s.id = si.postavshik
                WHERE si.grtov_id IS NULL
                  AND si.not_fit = 0
                  AND s.postavshik='{$supplier}'
                ORDER BY si.grimg_id DESC
                LIMIT $start, $limit
                ";
        } else {
            // получим группы картинок для одной страницы
            $sqlGrimgs =
                "
                SELECT distinct si.grimg_id as grimg
                FROM shop_image si
                INNER JOIN supplier s ON s.id = si.postavshik
                WHERE s.postavshik='{$supplier}'
                ORDER BY si.grimg_id DESC
                LIMIT {$start},{$limit}
                ";
        }

        // Получим группы товаров в этих группах картинок
        $resultSql =
            "
            SELECT
                   IF(si.grtov_id IS NULL AND si.not_fit =0, 1, 0) AS is_new,
                   IF(si.not_fit =0, 0, 1) AS no_gr,
                   CONCAT ('https://pd.ru/media/catalog/product/', si.image) As image,
                   si.upakovka as package,
                   si.name_pricelist,
                   si.artikul as sku,
                   si.grimg_id as grimg,
                   gt.grtov,
                   gt.grtov_sku,
                   gt.grtov_name,
                   IFNULL(si.new_name, si.name) AS sku_name,
                   c.attribute_set_name AS category_name
            FROM ({$sqlGrimgs}) sgin
            LEFT JOIN shop_image si
            ON si.grimg_id = sgin.grimg
            LEFT JOIN group_product gt
            ON gt.grtov = si.grtov_id
            LEFT JOIN category AS c
            ON c.id = si.attribute_set_id
            ORDER BY si.grimg_id DESC
            ";

        $result = $this->getEntityManager()->getConnection()->executeQuery($resultSql)->fetchAllAssociative();

        //сгруппируем группы товаров по группам картинок
        $grtovs = [];
        foreach ($result as $row) {
            $grtovs[$row['grimg']][$row['grtov']]['grtov_sku'] = $row['grtov_sku'];
            $grtovs[$row['grimg']][$row['grtov']]['grtov_name'] = $row['grtov_name'];
            $grtovs[$row['grimg']][$row['grtov']]['grtov'] = $row['grtov'];
            $grtovs[$row['grimg']][$row['grtov']]['grimg'] = $row['grimg'];

            if (is_null($row['sku'])) {
                continue;
            }
            $grtovs[$row['grimg']][$row['grtov']]['skus'][] = [
                'sku' => $row['sku'],
                'skuName' => $row['sku_name'],
                'skuCategoryName' => $row['category_name'],
                'image' => $row['image'],
                'package' => $row['package'],
                'pricelistName' => $row['name_pricelist'],
                'isNew' => (int)$row['is_new'],
                'hasNotGroup' => (int)$row['no_gr'],
            ];
        }

        //Добавим к результату пустые группы
        $groups = $this->getEntityManager()->getConnection()->executeQuery(
            "SELECT gt.grtov,
                        gt.grimg,
                        gt.grtov_sku,
                        gt.grtov_name
                FROM group_product gt
                INNER JOIN ({$sqlGrimgs}) sgin
                ON gt.grimg = sgin.grimg"
        )->fetchAllAssociative();

        foreach ($groups as $group) {
            if (!isset($grtovs[$group['grimg']][$group['grtov']])) {
                $grtovs[$group['grimg']][$group['grtov']] = [
                    'grtov' => $group['grtov'],
                    'grimg' => $group['grimg'],
                    'grtov_sku' => $group['grtov_sku'],
                    'grtov_name' => $group['grtov_name'],
                ];
            }
        }

        return $grtovs;
    }

}
