<?php

namespace App\Repositories;


use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;
use App\Entities\Category;
use Doctrine\ORM\Query;

class DoctrineCategoryRepository extends EntityRepository implements CategoryRepository
{
    public function create(Category $object): void
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush();
    }

    public function findAllArr(): array
    {
        $query = $this->getEntityManager()
            ->getRepository(Category::class)
            ->createQueryBuilder('c')
            ->orderBy('c.attributeSetName')
            ->getQuery();
        return $query->getResult(Query::HYDRATE_ARRAY);
    }

    public function deleteOldCats(array $catIds)
    {
        $this->getEntityManager()->createQueryBuilder()
            ->delete('App\Entities\Category', 'c')
            ->where('c.attributeSetId IN (:catIds)')
            ->setParameter('catIds', $catIds, Connection::PARAM_STR_ARRAY)
            ->getQuery()
            ->execute();
    }

    public function update(Category $category, string $attrSetName)
    {
        $category->setAttributeSetName($attrSetName);
        $this->getEntityManager()->flush();
    }

    public function insert(int $attributeSetId, string $attrSetName)
    {
        $category = new Category($attrSetName, $attributeSetId);
        $this->getEntityManager()->persist($category);
        $this->getEntityManager()->flush();
    }

    public function insertOrUpdate(int $attributeSetId, string $attrSetName)
    {
        $category = $this->getEntityManager()->getRepository(Category::class)->findOneBy(
            ['attributeSetId' => $attributeSetId]
        );
        /**
         * @var $category Category
         */
        if ($category != null) {
            $this->update($category, $attrSetName);
        } else {
            $this->insert($attributeSetId, $attrSetName);
        }
    }

    public function getCatIds(): array
    {
        return $this->getEntityManager()
            ->getConnection()->executeQuery("SELECT attribute_set_id FROM category ")
            ->fetchFirstColumn();
    }

    public function findDecorCats(): array
    {
        $query = $this->getEntityManager()
            ->getRepository(Category::class)
            ->createQueryBuilder('c')
            ->where("c.attributeSetName LIKE 'Декор (%'")
            ->orWhere("c.attributeSetName LIKE 'Подарки (%'")
            ->orderBy('c.attributeSetName')
            ->getQuery();
        return $query->getResult(Query::HYDRATE_ARRAY);
    }
}
