<?php

namespace App\Repositories;

use App\Entities\GroupProduct;
use Doctrine\ORM\EntityRepository;

class DoctrineGroupProductRepository extends EntityRepository implements GroupProductRepository
{
    public function create(GroupProduct $object): void
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush();
    }

}
