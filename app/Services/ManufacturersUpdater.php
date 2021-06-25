<?php

namespace App\Services;

use App\Entities\Manufacturer;
use App\Exceptions\ManufacturersUpdaterException;
use App\Repositories\ManufacturerRepository;
use Psr\Log\LoggerInterface;
use App\Exceptions\ShopImagesException;
use App\Repositories\MagentoStorage;
use App\Repositories\CategoryRepository;


/**
 * Класс, который обновит список производителей.
 *
 * Class ManufacturersUpdater
 * @package App\Services
 */
class ManufacturersUpdater
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
        $this->logger->info("Обновляем производителей...");
        $result = $this->magentoStorage->getManufacturers();

        if (!$result) {
            throw new ManufacturersUpdaterException("Не приходят производители из сайта.");
        }
        $this->logger->info("Получили из магенты производителей. Всего: " . count($result));
        foreach ($result as $mageManufacturer) {

            $this->manufacturerRepository->insertOrUpdate(
                (int)$mageManufacturer['manufacturer_id'],
                $mageManufacturer['manufacturer_name']
            );
        }
        $this->logger->info("Готово.");
    }

}
