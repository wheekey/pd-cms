<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use App\Repositories\MagentoStorage;
use App\Repositories\ShopImageRepository;

class OldSkusRemover
{
    /**
     * @var MagentoStorage
     */
    private $magentoStorage;
    /**
     * @var ShopImageRepository
     */
    private $shopImageRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        MagentoStorage $magentoStorage,
        ShopImageRepository $shopImageRepository,
        LoggerInterface $logger
    ) {
        $this->magentoStorage = $magentoStorage;
        $this->shopImageRepository = $shopImageRepository;
        $this->logger = $logger;
    }

    public function run()
    {
        $this->logger->info("Удаляем старые ску...");
        $mageEntityIds = $this->magentoStorage->getProductEntityIds();
        $picfindEntityIds = $this->shopImageRepository->getProductEntityIds();

        if (!empty($mageEntityIds) && !empty($picfindEntityIds)) {
            $this->shopImageRepository->deleteOldSkus(array_diff($picfindEntityIds, $mageEntityIds));
        }

        $this->logger->info("Удаление старых ску завершено.");
    }
}
