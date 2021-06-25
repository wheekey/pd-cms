<?php

namespace App\Services;

use App\Repositories\ManufacturerRepository;
use Psr\Log\LoggerInterface;
use App\Repositories\MagentoStorage;

use App\Repositories\CategoryRepository;


class OldManufacturersRemover
{
    /**
     * @var MagentoStorage
     */
    private $magentoStorage;

    /**
     * @var ManufacturerRepository
     */
    private $manufacturerRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        MagentoStorage $magentoStorage,
        ManufacturerRepository $manufacturerRepository,
        LoggerInterface $logger
    ) {
        $this->magentoStorage = $magentoStorage;
        $this->manufacturerRepository = $manufacturerRepository;
        $this->logger = $logger;
    }

    public function run()
    {
        $this->logger->info("Удаляем старых производителей...");
        $picfindManIds = $this->manufacturerRepository->getManufacturerIds();
        $mageManIds = $this->magentoStorage->getManufacturerIds();

        //Если будут сравниваться инты, то полезут ошибки и удалятся не старые категории.
        if (!empty($mageManIds) && !empty($picfindManIds)) {
            $this->manufacturerRepository->deleteOldManufacturers(array_diff($picfindManIds, $mageManIds));
        }
        $this->logger->info("Удаление старых категорий завершено.");
    }
}
