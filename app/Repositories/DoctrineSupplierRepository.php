<?php

namespace App\Repositories;

use App\Entities\User;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;
use App\Entities\Supplier;

class DoctrineSupplierRepository extends EntityRepository implements SupplierRepository
{
    private $tableName = "supplier";

    public function create(Supplier $supplier): void
    {
        $this->getEntityManager()->persist($supplier);
        $this->getEntityManager()->flush();
    }

    /**
     *
     * недавно добавленные картинки по поставщикам в днях
     * @param int $days
     *
     */
    public function findAllRecentlyUpdated(int $days)
    {
        $supplierIds = $this->getEntityManager()
            ->getConnection()->executeQuery(
                "SELECT distinct postavshik entity_id FROM shop_image si WHERE si.updated_at >= ( CURDATE() - INTERVAL {$days} DAY )"
            )
            ->fetchFirstColumn();

        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb
            ->select('s')
            ->from(Supplier::class, 's')
            ->where('s.id IN (:ids)')
            ->setParameter(':ids', $supplierIds, Connection::PARAM_STR_ARRAY)
            ->getQuery();

        return $query->getResult();
    }

    public function findAllActiveSuppliers(int $showOnlyNew): array
    {
        $sql = "SELECT * FROM supplier p
                WHERE p.is_visible = 1
                ORDER BY postavshik_value";

        if ($showOnlyNew === 1) {
            $sql = "SELECT p.postavshik, p.postavshik_value
                    FROM supplier AS p
                    WHERE p.has_new_products = 1
                    AND p.is_visible = 1
                   ";
        }

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();
    }

    public function update(Supplier $supplier, string $name)
    {
        $supplier->setPostavshikValue($name);
        $this->getEntityManager()->flush();
    }

    public function insert(int $supplierId, string $supplierName)
    {
        $supplier = new Supplier();
        $supplier->setPostavshik($supplierId);
        $supplier->setPostavshikValue($supplierName);
        $this->getEntityManager()->persist($supplier);
        $this->getEntityManager()->flush();
    }

    public function insertOrUpdate(int $supplierId, string $supplierName)
    {
        $supplier = $this->getEntityManager()->getRepository(Supplier::class)->findOneBy(
            ['postavshik' => $supplierId]
        );
        /**
         * @var $supplier Supplier
         */
        if ($supplier != null) {
            $this->update($supplier, $supplierName);
        } else {
            $this->insert($supplierId, $supplierName);
        }
    }

    public function getPostavshikIds(): array
    {
        return $this->getEntityManager()
            ->getConnection()->executeQuery("SELECT postavshik FROM supplier ")
            ->fetchFirstColumn();
    }

    public function deleteOldSups(array $supIds)
    {
        $this->getEntityManager()->createQueryBuilder()
            ->delete('App\Entities\Supplier', 'p')
            ->where('p.postavshik IN (:supIds)')
            ->setParameter('supIds', $supIds, Connection::PARAM_STR_ARRAY)
            ->getQuery()
            ->execute();
    }

    public function updateHasNewProducts()
    {
        $this->getEntityManager()
            ->getConnection()
            ->executeQuery(
                "
                UPDATE supplier SET has_new_products = 0 WHERE 1
                "
            );

        $supIds = $this->getEntityManager()
            ->getConnection()->executeQuery("
                    SELECT DISTINCT(s.postavshik)
                    FROM sku_group_image sg
                    INNER JOIN shop_image si ON sg.shop_image_id = si.id
                    INNER JOIN supplier s ON s.id = si.postavshik
                    LEFT JOIN sku_group_product st ON st.shop_image_id= sg.shop_image_id
                    LEFT JOIN sku_no_group sn ON sg.shop_image_id=sn.shop_image_id
                    WHERE st.shop_image_id IS NULL AND sn.shop_image_id IS NULL
                ")
            ->fetchFirstColumn();

        $this->getEntityManager()->createQueryBuilder()
            ->update('App\Entities\Supplier', 's')
            ->set('s.hasNewProducts', ':hasNewProducts')
            ->where('s.postavshik IN (:supIds)')
            ->setParameter('hasNewProducts', 1)
            ->setParameter('supIds', $supIds, Connection::PARAM_STR_ARRAY)
            ->getQuery()
            ->execute();

    }
}
