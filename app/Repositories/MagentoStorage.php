<?php

namespace App\Repositories;

interface MagentoStorage
{
    public function getCategories();

    public function getAttributeSet(): array;

    public function getCatIds();

    public function getManufacturerIds(): array;

    public function getSuppliers();

    public function getSupplierIds();

    public function getShopImageByEntityId(int $entityId);

    public function getProductEntityIds();

    public function getMagentoImageLinks();

    public function getMagentoPriceListNames();

    public function getUpakovka();

    public function getPostavshik();

    public function getProductNames(): array;

    public function getGroupProductNames(): array;

    public function getImagesByEntityId(int $entityId): array;

    public function getManufacturers(): array;
}


