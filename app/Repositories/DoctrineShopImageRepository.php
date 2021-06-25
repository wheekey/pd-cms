<?php

namespace App\Repositories;

use App\Domain\AlgorithmHelper;
use App\Entities\AsAttributeOption;
use App\Entities\AsProductOptionRelation;
use App\Entities\Category;
use App\Entities\CategorySetter\ProductCategoryRelation;
use App\Entities\GroupProduct;
use App\Entities\Supplier;
use App\Exceptions\GrimgCantBeCreatedException;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;
use App\Entities\ShopImage;
use Doctrine\ORM\Query;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Date;
use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;
use Doctrine\ORM\Query\Expr\Join;

class DoctrineShopImageRepository extends EntityRepository implements ShopImageRepository
{
   use PaginatesFromRequest;

    private $tableName = "shop_image";

    public function create(ShopImage $object): void
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush();
    }

    public function update()
    {
        $this->getEntityManager()->flush();
    }

    public function insert(ShopImage $image)
    {
        $this->getEntityManager()->persist($image);
        $this->getEntityManager()->flush();
    }

    public function delete(int $id)
    {
        $this->getEntityManager()->createQueryBuilder()
            ->delete('App\Entities\ShopImage', 'si')
            ->where('si.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }

    public function deleteOldSkus(array $entityIds)
    {
        $this->getEntityManager()->createQueryBuilder()
            ->delete('App\Entities\ShopImage', 'si')
            ->where('si.entityId IN (:entityIds)')
            ->setParameter('entityIds', $entityIds, Connection::PARAM_STR_ARRAY)
            ->getQuery()
            ->execute();
    }

    public function getUngroupedProductsCnt(): int
    {
        $sql = "
                SELECT COUNT(si.id)
                FROM shop_image si
                INNER JOIN supplier s
                    on si.postavshik = s.id
                WHERE s.is_visible = 1
                  AND si.not_fit = 0
                  and si.grimg_id IS NULL
                ";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchOne();
    }

    public function updateDop()
    {
        $this->getEntityManager()->getConnection()->executeQuery(
            "UPDATE shop_image SET dop='' WHERE dop <> ''"
        );
    }

    public function moveSku(string $sku, int $grtov)
    {
        /* @var $shopImage ShopImage*/
        $shopImage = $this->findOneBy(['artikul' => $sku]);
        $shopImage->setGroupProduct($this->getEntityManager()->getRepository(GroupProduct::class)->findOneBy(['id' => $grtov]));
        $shopImage->setNotFit(false);
        $this->update();
    }

    public function makeAsNewSku(string $sku)
    {
        /* @var $shopImage ShopImage*/
        $shopImage = $this->findOneBy(['artikul' => $sku]);
        $shopImage->setNotFit(false);
        $shopImage->setGroupProduct(null);
        $this->update();

    }

    public function makeAsNotFitSku(string $sku)
    {
        /* @var $shopImage ShopImage*/
        $shopImage = $this->findOneBy(['artikul' => $sku]);
        $shopImage->setNotFit(true);
        $shopImage->setGroupProduct(null);
        $this->update();
    }

    public function gotoRemakeSku(string $sku)
    {
        $this->getEntityManager()->getConnection()->executeQuery("DELETE FROM shop_image WHERE artikul='{$sku}'");
    }

    public function renameSkuName(string $sku, string $skuName)
    {
        /* @var $shopImage ShopImage*/
        $shopImage = $this->findOneBy(['artikul' => $sku]);
        $shopImage->setNewName($skuName);
        $shopImage->setUpdatedAt(new \DateTime());
        $shopImage->setNameUpdatedAt(new \DateTime());
        // Обновляем updated_at в grtov_sku, потому что выгрузка на сайт ориентруется на эту дату.
        // Возможно из-за этого новинки не попадают на сайт.
        $shopImage->getGroupProduct()->setUpdatedAtLocalName(new \DateTime());
        $this->update();
    }

    public function removeSubGroup(int $grtov)
    {
        $connection = $this->getEntityManager()->getConnection();
        $connection->executeQuery(
            "UPDATE shop_image SET grtov_id= null WHERE grtov_id='{$grtov}'"
        );
        $connection->executeQuery(
            "DELETE FROM group_product g
                WHERE g.grtov='{$grtov}'"
        );


    }

    public function createSubGroup(int $grimg, string $grtovName)
    {
        $nextIncrementId = $this->getEntityManager()
            ->getConnection()->executeQuery("SELECT MAX(grtov)+ 1 FROM group_product")
            ->fetchOne();

        $this->getEntityManager()->getConnection()->executeQuery(
            "INSERT INTO group_product SET
                        grtov_sku=CONCAT('gr',{$nextIncrementId}),
                        grimg='{$grimg}',grtov_name='{$grtovName}', updated_at_local_name = now()
            "
        );
    }

    public function changeSubGroupName(int $grtov, string $grtovName)
    {
        $connection = $this->getEntityManager()->getConnection();
        $connection->executeQuery(
            "UPDATE group_product SET grtov_name='{$grtovName}', updated_at_local_name=NOW() WHERE grtov='{$grtov}'"
        );

        // Обновляем дочерние при изменении родителя
        $this->renameChildren($grtov, $grtovName);
    }

    private function renameChildren(int $grtov, string $grtovName)
    {
        $grTovChildren = $this->getGrTovChildren($grtov);

        foreach ($grTovChildren as $child) {
            $newSkuName = $this->formNewChildrenName($child["sku_name"], $grtovName);
            $shopImageId = $this->getShopImageId($child["sku"]);

            /* @var $shopImage ShopImage*/
            $shopImage = $this->findOneBy(['id' => $shopImageId]);
            $shopImage->setNewName($newSkuName);
            $shopImage->setNameUpdatedAt(new \DateTime());
            $this->update();
        }
    }

    private function formNewChildrenName(string $oldName, string $newGroupName)
    {
        $oldNamePart = preg_replace("/.*?(\(.*)/xuis", "$1", $oldName);
        if ($oldNamePart === $oldName) {
            return $newGroupName;
        }

        return $newGroupName . " " . $oldNamePart;
    }

    private function getGrTovChildren(int $grtov): array
    {
        return $this->getEntityManager()
            ->getConnection()
            ->executeQuery(
                "SELECT si.artikul as sku, si.grtov_id as grtov, IFNULL(si.new_name, si.name) AS sku_name
                     FROM shop_image si
                     WHERE si.grtov_id='{$grtov}'"
            )->fetchAllAssociative();
    }

    private function getSkuEntityId(string $sku): int
    {
        return $this->getEntityManager()
            ->getConnection()->executeQuery("SELECT entity_id FROM shop_image WHERE artikul='{$sku}' LIMIT 1")
            ->fetchOne();
    }

    private function getShopImageId(string $sku): int
    {
        return $this->getEntityManager()
            ->getConnection()->executeQuery("SELECT id FROM shop_image WHERE artikul='{$sku}' LIMIT 1")
            ->fetchOne();
    }

    public function getProductEntityIds(): array
    {
        return $this->getEntityManager()
            ->getConnection()->executeQuery("SELECT entity_id FROM shop_image ")
            ->fetchFirstColumn();
    }

    public function findAllNew(): array
    {
        return $this->getEntityManager()->getRepository(ShopImage::class)->findBy(['kGrey' => null]);
    }

    public function formReport(int $unixTime): array
    {
        $sqlFromDate = '';
        if ($unixTime > 0) {
            $sqlFromDate = ' AND gt.updated_at_local_name >= FROM_UNIXTIME(' . $unixTime . ')';
        }

        $this->getEntityManager()
            ->getConnection()
            ->executeQuery(
                "DROP TABLE IF EXISTS t1 "
            );

        $this->getEntityManager()
            ->getConnection()
            ->executeQuery(
                "CREATE TABLE t1 (SELECT gt.grtov_sku
                                        FROM shop_image si
                                        LEFT JOIN group_product gt
                                        ON gt.grtov = si.grtov_id
                                        GROUP BY gt.grtov_sku
                                        HAVING COUNT(*) > 1)"
            );

        $this->getEntityManager()
            ->getConnection()
            ->executeQuery(
                "create index t1_grtov_sku_index_2
	                on t1 (grtov_sku)"
            );

        $result['sku_grtov'] = $this->getEntityManager()
            ->getConnection()
            ->executeQuery(
                'SELECT si.artikul as sku, IFNULL(si.new_name, si.name) AS sku_name, gt.grtov_sku
                                        FROM shop_image si
                                        LEFT JOIN group_product gt
                                        ON gt.grtov = si.grtov_id
                                        WHERE gt.grtov_sku IN (SELECT grtov_sku
                                        FROM t1)' . $sqlFromDate
            )->fetchAllAssociative();

        $result['groups_tovar'] = $this->getEntityManager()
            ->getConnection()
            ->executeQuery(
                'SELECT DISTINCT gt.grtov_sku, gt.grtov_name, gt.updated_at_local_name as updated_at
                                        FROM group_product gt
                                        LEFT JOIN group_image gi ON gi.grimg = gt.grimg
                                        WHERE gt.grtov IN (
                                        SELECT DISTINCT(grtov_id) as grtov
                                        FROM shop_image) AND gt.grtov_sku IN (
                                        SELECT grtov_sku
                                        FROM t1
                                        )' . $sqlFromDate
            )->fetchAllAssociative();

        $this->getEntityManager()
            ->getConnection()
            ->executeQuery(
                "DROP TABLE IF EXISTS t1 "
            );

        return $result;
    }

    public function findBySku(string $sku): ?ShopImage
    {
        return $this->getEntityManager()->getRepository(ShopImage::class)->findOneBy(['artikul'=>$sku]);
    }

    public function findByCatId(int $categoryId): array
    {
        $builder = $this->getBuilderFindByCatId($categoryId);
        return $builder->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }

    public function findBySupId(int $supplierId)
    {
        $builder = $this->getBuilderFindBySupId($supplierId);
        return $builder->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }

    public function findByCatIdAndSupId(int $categoryId, int $supplierId)
    {
        $builder = $this->getBuilderFindByCatIdAndSupId($categoryId, $supplierId);
        return $builder->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }

    private function getBuilderFindByCatId(int $categoryId){
        return $this->getEntityManager()
            ->getRepository(ShopImage::class)
            ->createQueryBuilder('c')
            ->where('c.attributeSet = ?1')
            ->setParameter(1, $this->getEntityManager()->getRepository(Category::class)->findOneBy(['id'=>$categoryId]));
    }

    private function getBuilderFindBySupId(int $supplierId){
        return $this->getEntityManager()
            ->getRepository(ShopImage::class)
            ->createQueryBuilder('c')
            ->where('c.postavshik = ?1')
            ->setParameter(1, $this->getEntityManager()->getRepository(Supplier::class)->findOneBy(['id'=>$supplierId]))
            ;
    }

    private function getBuilderFindByCatIdAndSupId(int $categoryId, int $supplierId){
        return $this->getEntityManager()
            ->getRepository(ShopImage::class)
            ->createQueryBuilder('c')
            ->where('c.postavshik = ?1')
            ->andWhere('c.attributeSet = ?2')
            ->setParameter(1, $this->getEntityManager()->getRepository(Supplier::class)->findOneBy(['id'=>$supplierId]))
            ->setParameter(2, $this->getEntityManager()->getRepository(Category::class)->findOneBy(['id'=>$categoryId]));
    }

    /**
     * @return ShopImage[]|LengthAwarePaginator
     */
    public function paginateFindByCatIdAndSupId(int $categoryId, int $supplierId, int $perPage = 15, string $pageName = 'page'): LengthAwarePaginator
    {
        $builder = $this->getBuilderFindByCatIdAndSupId($categoryId, $supplierId);
        return $this->paginate($builder->getQuery(), $perPage, $pageName);
    }

    public function paginateFindByCatId(int $categoryId, int $perPage = 15, string $pageName = 'page'): LengthAwarePaginator
    {
        $builder = $this->getBuilderFindByCatId($categoryId);
        return $this->paginate($builder->getQuery(), $perPage, $pageName);
    }

    public function paginateFindBySupId(int $supplierId, int $perPage = 15, string $pageName = 'page'): LengthAwarePaginator
    {
        $builder = $this->getBuilderFindBySupId($supplierId);
        return $this->paginate($builder->getQuery(), $perPage, $pageName);
    }

    public function paginateFindByColorId(int $colorId, int $perPage = 15, string $pageName = 'page'): LengthAwarePaginator
    {
        $builder = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('s')
            ->from(ShopImage::class,'s')
            ->join(AsProductOptionRelation::class, 'rel', 'WITH', 's = rel.shopImage')
            ->join(AsAttributeOption::class, 'opt', 'WITH', 'opt = rel.asAttributeOption')
            ->where('rel.asAttributeOption = ?1')
            ->setParameter(1, $this->getEntityManager()->getRepository(AsAttributeOption::class)->findOneBy(['id'=>$colorId]));

        return $this->paginate($builder->getQuery(), $perPage, $pageName);
    }



    public function paginateFindSimilarImageGroupsByImage(int $perPage, string $pageName): LengthAwarePaginator
    {
       $sql = "SELECT image
                FROM (
                    SELECT distinct gi.grimg, si.image
                    FROM shop_image si
                    INNER JOIN group_image gi
                    ON si.grimg_id = gi.grimg
                    ) s
                GROUP BY image
                HAVING count(image) > 1";

        $images = $this->getEntityManager()
            ->getConnection()->executeQuery($sql)
            ->fetchFirstColumn();

        $builder = $this->getEntityManager()
            ->getRepository(ShopImage::class)
            ->createQueryBuilder('si')
            ->where('si.image IN (:images)')
            ->setParameter('images', $images, Connection::PARAM_STR_ARRAY)
        ->groupBy('si.image');

        $r = $builder->getQuery()->getSQL();

        return $this->paginate($builder->getQuery(), $perPage, $pageName);
    }


    public function findAllUngroupedBySupplier(Supplier $supplier): array
    {
        $sql = "
        SELECT si.*
        FROM shop_image si
        WHERE si.grimg_id IS NULL AND postavshik = {$supplier->getId()}
        ";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();
    }

    /**
     * Тот самый алгоритм группировки
     * @param $level - По всей видимости - это регулятор алгоритма, который формирует выборку совпавших
     * @return array
     * @throws GrimgCantBeCreatedException
     */
    public function findGrimgForUngroupedSku(array $shopImageRow, int $level, Supplier $supplier): int
    {
        $kGreyMin = AlgorithmHelper::getKGreyMin($shopImageRow['k_grey'], $level);
        $kGreyMax = AlgorithmHelper::getKGreyMax($shopImageRow['k_grey'], $level);
        $kDelta = AlgorithmHelper::getKDeltaMax($level);

        $sql = "
                SELECT {$this->dormStrDopSql($shopImageRow)} k_delta, grimg_id as grimg
                FROM {$this->tableName} si
                WHERE
                  si.attribute_set_id = '{$shopImageRow['attribute_set_id']}'
                  AND si.k_grey >= $kGreyMin
                  AND si.k_grey <= $kGreyMax
                  AND si.id <> '{$shopImageRow['id']}'
                  AND si.grimg_id is not null
                  AND si.postavshik = {$supplier->getId()}
                group by si.grimg_id
                HAVING k_delta < {$kDelta}
                ORDER BY k_delta ASC
                LIMIT 1
             ";

        $result = $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();

        if (empty($result)) {
            throw new GrimgNotFoundException("Для ску {$shopImageRow['artikul']} еще не создана группа групп.");
        }

        return $result[0]["grimg"];
    }

    public function findAllSimilarUngroupedSkus(array $shopImageRow, int $level, Supplier $supplier): array
    {
        $kGreyMin = AlgorithmHelper::getKGreyMin($shopImageRow['k_grey'], $level);
        $kGreyMax = AlgorithmHelper::getKGreyMax($shopImageRow['k_grey'], $level);
        $kDelta = AlgorithmHelper::getKDeltaMax($level);

        $sql = "
                SELECT {$this->dormStrDopSql($shopImageRow)} k_delta, si.grimg_id as grimg, si.artikul
                FROM {$this->tableName} si
                WHERE
                  si.attribute_set_id = '{$shopImageRow['attribute_set_id']}'
                  AND si.k_grey>=$kGreyMin
                  AND si.k_grey<=$kGreyMax
                  AND si.grimg_id is null
                  AND si.postavshik = {$supplier->getId()}
                HAVING k_delta<{$kDelta}
                ORDER BY k_delta ASC
             ";

        //echo $sql;
        $result = $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();

        if (count($result) < 2) {
            throw new GrimgCantBeCreatedException(
                "Для sku {$shopImageRow['artikul']} создавать группу пока нет смысла. Нет похожих товаров."
            );
        }

        return $result;
    }

    /**
     * @param array $shopImageRow
     * @return string
     */
    private function dormStrDopSql(array $shopImageRow): string
    {
        $str_dop_arr = [];
        for ($i = 1; $i <= 16; $i++) {
            $str_dop_arr[] = 'ABS(CAST(k_1_' . $i . ' AS SIGNED) -'
                . $shopImageRow['k_1_' . $i] . ') +ABS(CAST(k_2_' . $i . ' AS SIGNED)-'
                . $shopImageRow['k_2_' . $i] . ')+ABS(CAST(k_3_' . $i . ' AS SIGNED)-'
                . $shopImageRow['k_3_' . $i] . ')';
        }
        $str_dop_sql = implode('+', $str_dop_arr);
        return $str_dop_sql;
    }

    public function findOneNotSetCategory(array $params): ?ShopImage
    {
        //TODO поставить айдишку, соответствующую ДЕКОР (НА ПРОВЕРКУ)
        $builder = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('si')
            ->from(ShopImage::class,'si')
            ->leftJoin(ProductCategoryRelation::class, 'rel', 'WITH', 'si = rel.shopImage')
            ->where('rel.shopImage is NULL AND si.attributeSet = 1');

        if(isset($params['manufacturer'])){
            $builder = $builder->andWhere("si.manufacturer = :manufacturer")
                     ->setParameter('manufacturer', $params['manufacturer']['id']);
        }

        if(isset($params['supplier'])){
            $builder = $builder->andWhere("si.postavshik = :supplier")
                ->setParameter('supplier', $params['supplier']['id']);
        }

        $result = $builder
            ->setMaxResults(1)
            ->getQuery()->getResult();

        return $result[0] ?? null;
    }
}
