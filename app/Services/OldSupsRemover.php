<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use App\Repositories\MagentoStorage;
use App\Repositories\SupplierRepository;


class OldSupsRemover
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
        $this->logger->info("Удаляем старых поставщиков...");
        $picfindSupIds = $this->supplierRepository->getPostavshikIds();
        $mageSupIds = $this->magentoStorage->getSupplierIds();

        if (!empty($mageSupIds) && !empty($picfindSupIds)) {
            $this->supplierRepository->deleteOldSups(array_diff($picfindSupIds, $mageSupIds));
        }
        $this->logger->info("Удаление старых поставщиков завершено.");
    }
}
