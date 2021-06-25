<?php

namespace App\Repositories;

use App\Entities\User;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;
use App\Entities\Supplier;

interface SupplierRepository
{

    public function create(Supplier $supplier): void;

    /**
     *
     * недавно добавленные картинки по поставщикам в днях
     * @param int $days
     *
     */
    public function findAllRecentlyUpdated(int $days);

    public function findAllActiveSuppliers(int $showOnlyNew): array;

    public function update(Supplier $supplier, string $name);

    public function insert(int $supplierId, string $supplierName);

    public function insertOrUpdate(int $supplierId, string $supplierName);

    public function getPostavshikIds(): array;

    public function deleteOldSups(array $supIds);

    public function updateHasNewProducts();

}
