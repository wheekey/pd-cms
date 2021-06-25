<?php

namespace App\Repositories;

use App\Entities\AsAttribute;
use Doctrine\ORM\EntityRepository;

class DoctrineAsAttributeRepository extends EntityRepository implements AsAttributeRepository
{
    public function create(AsAttribute $object): void
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush();
    }

}
