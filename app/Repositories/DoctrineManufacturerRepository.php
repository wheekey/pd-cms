<?php

namespace App\Repositories;

use App\Entities\Manufacturer;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;

class DoctrineManufacturerRepository extends EntityRepository implements ManufacturerRepository
{

    public function create(Manufacturer $manufacturer): void
    {
        $this->getEntityManager()->persist($manufacturer);
        $this->getEntityManager()->flush();
    }

    public function insertOrUpdate(int $manufacturerId, string $manufacturerName)
    {
        $manufacturer = $this->getEntityManager()->getRepository(Manufacturer::class)->findOneBy(
            ['manufacturerId' => $manufacturerId]
        );
        /**
         * @var $manufacturer Manufacturer
         */
        if ($manufacturer != null) {
            $this->update($manufacturer, $manufacturerName);
        } else {
            $this->insert($manufacturerId, $manufacturerName);
        }
    }

    public function update(Manufacturer $manufacturer, string $manufacturerName)
    {
        $manufacturer->setName($manufacturerName);
        $this->getEntityManager()->flush();
    }

    public function insert(int $manufacturerId, string $manufacturerName)
    {
        $manufacturer = new Manufacturer($manufacturerName,$manufacturerId);
        $this->getEntityManager()->persist($manufacturer);
        $this->getEntityManager()->flush();
    }

    public function getManufacturerIds(): array
    {
        return $this->getEntityManager()
            ->getConnection()->executeQuery("SELECT manufacturer_id FROM manufacturer ")
            ->fetchFirstColumn();
    }

    public function deleteOldManufacturers(array $manufacturerIds)
    {
        $this->getEntityManager()->createQueryBuilder()
            ->delete('App\Entities\Manufacturer', 'm')
            ->where('m.manufacturerId IN (:manIds)')
            ->setParameter('manIds', $manufacturerIds, Connection::PARAM_STR_ARRAY)
            ->getQuery()
            ->execute();
    }
}
