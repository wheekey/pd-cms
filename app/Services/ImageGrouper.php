<?php

namespace App\Services;

use App\Entities\GroupImage;
use App\Entities\ShopImage;
use App\Repositories\GroupImageRepository;
use App\Repositories\ShopImageRepository;
use App\Repositories\SupplierRepository;
use Psr\Log\LoggerInterface;
use App\Entities\Supplier;
use App\Exceptions\GrimgCantBeCreatedException;
use App\Exceptions\GrimgNotFoundException;

final class ImageGrouper
{
    const LEVEL = 2;

    private $handledSkusBySupplier = [];

    /**
     * ImageGrouper constructor.
     */
    public function __construct(
        private LoggerInterface $logger,
        private SupplierRepository $supplierRepository,
        private ShopImageRepository $shopImageRepository,
        private GroupImageRepository $groupImageRepository,

    ) {}

    private function markAsHandled(string $sku)
    {
        $this->handledSkusBySupplier[$sku] = 1;
    }

    private function isHandledSku(string $sku): bool
    {
        return array_key_exists($sku, $this->handledSkusBySupplier);
    }

    public function groupAll(int $days)
    {
        /**
         * @var $supplier Supplier
         */
        foreach ($this->supplierRepository->findAllRecentlyUpdated($days) as $supplier) {
            $this->group($supplier);
        }
    }

    public function group(Supplier $supplier)
    {
        $this->logger->info("Группировка поставщика: {$supplier->getPostavshikValue()}");
        $this->groupSupplier($supplier);
    }

    private function resetHandledSkusBySupplier(){
        $this->handledSkusBySupplier = [];
    }

    private function groupSupplier(Supplier $supplier)
    {
        $this->resetHandledSkusBySupplier();

        // Группируем только те товары, у которых нет группы
        $ungroupedImages = $this->shopImageRepository->findAllUngroupedBySupplier($supplier);
        $this->logger->info("Несгруппированных: " . count($ungroupedImages));

        foreach ($ungroupedImages as $ungroupedImage) {
            try {
                $this->handleSku($ungroupedImage, $supplier);
            } catch (GrimgCantBeCreatedException $e) {
                $this->logger->info($e);
            }
        }
    }

    private function writeCorrespondenceToGroup(array $similarUngroupedImages, int $grimg)
    {
        foreach ($similarUngroupedImages as $similarUngroupedImage) {
            $this->setRelation($similarUngroupedImage["artikul"], $grimg);
            $this->markAsHandled($similarUngroupedImage["artikul"]);
        }
    }

    private function setRelation(string $sku, int $grImageId)
    {
        /* @var $shopImage ShopImage*/
        $shopImage = $this->shopImageRepository->findBySku($sku);
        $shopImage->setGroupImage($this->groupImageRepository->findOneBy(['id' => $grImageId]));
        $this->shopImageRepository->update();

    }

    /**
     * @param mixed $ungroupedImage
     * @throws GrimgCantBeCreatedException
     */
    private function handleSku(mixed $ungroupedImage, Supplier $supplier): void
    {
        if (!$this->isHandledSku($ungroupedImage["artikul"])) {
            try {
                $grimg = $this->shopImageRepository->findGrimgForUngroupedSku($ungroupedImage, self::LEVEL, $supplier);
                $this->setRelation($ungroupedImage['artikul'], $grimg);
            } catch (GrimgNotFoundException $ex) {
                $this->handleNewGroup($ungroupedImage, $supplier);
            }
        }
    }

    /**
     * @param mixed $ungroupedImage
     * @throws GrimgCantBeCreatedException
     */
    private function handleNewGroup(mixed $ungroupedImage, Supplier $supplier): void
    {
        // Найдем товары похожие на него несгруппированные и он сам
        $similarUngroupedImages = $this->shopImageRepository->findAllSimilarUngroupedSkus(
            $ungroupedImage,
            self::LEVEL, $supplier
        );

        // Создадим GroupImage
        $groupImage = $this->groupImageRepository->create(new GroupImage());
        $this->logger->info("Создали GroupImage {$groupImage->getId()}");
        $this->writeCorrespondenceToGroup($similarUngroupedImages, $groupImage->getId());
    }

}
