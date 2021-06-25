<?php

namespace App\Repositories;

use App\Entities\Manufacturer;

interface ManufacturerRepository
{

    public function create(Manufacturer $manufacturer): void;

    public function insertOrUpdate(int $manufacturerId, string $manufacturerName);

    public function update(Manufacturer $manufacturer, string $manufacturerName);

    public function insert(int $manufacturerId, string $manufacturerName);

    public function getManufacturerIds(): array;

    public function deleteOldManufacturers(array $manufacturerIds);

}
