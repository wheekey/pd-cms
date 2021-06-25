<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use App\Exceptions\ShopImagesException;
use App\Repositories\MagentoStorage;
use App\Repositories\SupplierRepository;

/**
 * Класс, который обновит значение has_new_products в таблице supplier
 *
 * @package App\Services
 */
class SuppliersHaveNewProductsUpdater
{
    public function __construct(
        private SupplierRepository $supplierRepository,
        private LoggerInterface $logger
    ) {}

    public function run()
    {
        $this->logger->info("Обновляем has_new_products...");
        $this->supplierRepository->updateHasNewProducts();
        $this->logger->info("Готово.");
    }

}
