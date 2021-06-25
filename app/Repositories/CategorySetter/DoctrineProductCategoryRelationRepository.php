<?php

namespace App\Repositories\CategorySetter;



use App\Entities\CategorySetter\ProductCategoryRelation;
use Doctrine\ORM\EntityRepository;

final class DoctrineProductCategoryRelationRepository extends EntityRepository implements ProductCategoryRelationRepository
{

    public function create(ProductCategoryRelation $productCategoryRelation): void
    {
        $this->getEntityManager()->persist($productCategoryRelation);
        $this->getEntityManager()->flush();
    }

}
