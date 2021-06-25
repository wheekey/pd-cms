<?php

namespace App\Repositories;

use App\Entities\AsAttributeOption;
use App\Entities\AsProductOptionRelation;
use App\Entities\ShopImage;
use Doctrine\ORM\EntityRepository;

class DoctrineAsProductOptionRelationRepository extends EntityRepository implements AsProductOptionRelationRepository
{
    public function create(AsProductOptionRelation $object): void
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush();
    }

    public function save(int $optionId, int $productId){
        $em = $this->getEntityManager();
        $asProductOptionRelation = new AsProductOptionRelation();
        $asProductOptionRelation->setAsAttributeOption($em->find(AsAttributeOption::class, $optionId));
        $asProductOptionRelation->setShopImage($em->find(ShopImage::class, $productId));
        $em->persist($asProductOptionRelation);
        $em->flush();
    }

    public function delete(int $optionId, int $productId){
        $this->getEntityManager()
            ->getConnection()
            ->executeQuery(
                "DELETE FROM as_product_option_relation WHERE product_id = {$productId} AND option_id = {$optionId} "
            );
    }

    public function isExistRelation(int $optionId, int $productId): bool
    {
        return (bool)$this->getEntityManager()
            ->getConnection()->executeQuery("SELECT id
                                                 FROM as_product_option_relation
                                                 WHERE option_id='{$optionId}' AND product_id='{$productId}'
                                                 LIMIT 1")
            ->fetchOne();
    }

    public function formReport(): array
    {
        return $this->getEntityManager()
            ->getConnection()->executeQuery("SELECT id, option_id, product_id
                                                 FROM as_product_option_relation
                                                 ")
            ->fetchAllAssociative();
    }
}
