<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use App\Exceptions\ShopImagesException;
use App\Repositories\MagentoStorage;
use App\Repositories\SupplierRepository;

/**
 * Класс, который обновит список Поставщиков.
 *
 * Class SuppliersUpdater
 * @package App\Services
 */
class SuppliersUpdater
{
    /**
     * @var MagentoStorage
     */
    private $magentoStorage;
    /**
     * @var SupplierRepository
     */
    private $supplierRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        MagentoStorage $magentoStorage,
        SupplierRepository $supplierRepository,
        LoggerInterface $logger
    ) {
        $this->magentoStorage = $magentoStorage;
        $this->supplierRepository = $supplierRepository;
        $this->logger = $logger;
    }

    public function run()
    {
        $this->logger->info("Обновляем поставщиков...");
        $result = $this->magentoStorage->getSuppliers();
        if (!$result) {
            throw new ShopImagesException("Не приходят поставщики из сайта.");
        }

        $this->logger->info("Получили из магенты поставщиков. Всего: " . count($result));
        foreach ($result as $mageSupplier) {
            if (!empty($mageSupplier['postavshik_value'])) {
                $this->supplierRepository->insertOrUpdate(
                    (int)$mageSupplier['postavshik'],
                    $mageSupplier['postavshik_value']
                );
            }
        }
        $this->logger->info("Готово.");
    }

}
