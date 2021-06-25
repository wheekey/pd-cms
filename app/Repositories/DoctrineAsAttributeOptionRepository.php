<?php

namespace App\Repositories;

use App\Entities\AsAttribute;
use App\Entities\AsAttributeOption;
use App\Entities\Category;
use App\Entities\ShopImage;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class DoctrineAsAttributeOptionRepository extends EntityRepository implements AsAttributeOptionRepository
{

    public function create(AsAttributeOption $object): void
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush();
    }

    public function findAllArr(): array
    {
        $query = $this->getEntityManager()
            ->getRepository(AsAttributeOption::class)
            ->createQueryBuilder('o')
            ->addSelect('a')
            ->leftJoin('o.asAttribute', 'a')
            ->getQuery();

        return $query->getResult(Query::HYDRATE_ARRAY);
    }

    private function findAllByOptionName(string $optionName): array{
        $query = $this->getEntityManager()
            ->getRepository(AsAttributeOption::class)
            ->createQueryBuilder('o')
            ->addSelect('a')
            ->leftJoin('o.asAttribute', 'a')
            ->where('o.asAttribute = ?1')
            ->setParameter(1, $this->getEntityManager()->getRepository(AsAttribute::class)->findOneBy(['attributeName'=>$optionName]))
            ->getQuery();

        return $query->getResult(Query::HYDRATE_ARRAY);

    }

    public function findAllColorOptions(): array
    {
        return $this->findAllByOptionName('Цвет');
    }

    public function findAllStyleOptions(): array
    {
        return $this->findAllByOptionName('Стиль');
    }

    public function findAllPictureOptions(): array
    {
        return $this->findAllByOptionName('Рисунок');
    }

}
