<?php

namespace App\Services;

use App\Repositories\GroupProductRepository;
use App\Repositories\ShopImageRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use App\Entities\GroupProduct;
use App\Entities\ShopImage;
use App\Repositories\MagentoStorage;


class ShopImageNamesUpdater
{

    public function __construct(
        private MagentoStorage $magentoStorage,
        private LoggerInterface $logger,
        private EntityManagerInterface $em,
        private ShopImageRepository $shopImageRepository,
        private GroupProductRepository $groupProductRepository
    ) {

    }

    /**
     *
     * Метод, который обновит имена товаров, которые приходят из сайта.
     * Это нужно для того, чтобы запоминать дату и время изменения названия товара на сайте, чтобы вдруг при
     * обновлении имен из программы группировки на сайт не перезатерлись изменения на сайте, которые были произведены ранее,
     * чем в программе группировки.
     *
     */
    public function run()
    {
        $this->logger->info("updateShopSimpleProductSkuNames");
        $this->updateShopSimpleProductSkuNames();
        $this->logger->info("updateShopGroupProductSkuNames");
        $this->updateShopGroupProductSkuNames();
    }

    /**
     * Обновляем имена симплов
     */
    private function updateShopSimpleProductSkuNames()
    {
        $this->updateSimpleNamesInChunks($this->magentoStorage->getProductNames());
    }

    private function updateSimpleNamesInChunks(array $magentoProductsInfo)
    {
        $batchSize = 500;
        for ($i = 0; $i < count($magentoProductsInfo); ++$i) {
            $productInfo = $magentoProductsInfo[$i];
            /**
             * @var $shopImage ShopImage
             */
            $shopImage = $this->shopImageRepository->findOneBy(["entityId" => $productInfo["entity_id"]]);
            if ($shopImage !== null) {
                if ($productInfo['name'] !== $shopImage->getName()) {
                    $shopImage->setName($productInfo['name']);
                    $shopImage->setNameUpdatedAt(new DateTime());
                    $shopImage->setNewName($productInfo['name']);

                    $this->em->persist($shopImage);
                }
            }

            if (($i % $batchSize) === 0) {
                $this->em->flush();
                $this->em->clear(); // Detaches all objects from Doctrine!
            }
        }

        $this->em->flush(); // Persist objects that did not make up an entire batch
        $this->em->clear();
    }

    private function updateGroupNamesInChunks(array $magentoProductsInfo)
    {
        $this->logger->info("Получили имена из сайта.");
        $batchSize = 500;
        for ($i = 0; $i < count($magentoProductsInfo); ++$i) {
            $productInfo = $magentoProductsInfo[$i];
            /**
             * @var $groupProduct GroupProduct
             */
            $groupProduct = $this->groupProductRepository->findOneBy(
                ["grtovSku" => $productInfo["sku"]]
            );
            if ($groupProduct !== null) {
                // $this->logger->info($productInfo['name']);
                if ($productInfo['name'] !== $groupProduct->getGrtovNameSite()) {
                    //syncing Names
                    $groupProduct->setGrtovNameSite($productInfo['name']);
                    $groupProduct->setGrtovName($productInfo['name']);
                    $groupProduct->setUpdatedAtSiteName(new DateTime());
                    $groupProduct->setUpdatedAtLocalName(new DateTime());
                    $this->em->persist($groupProduct);
                }
            }

            if (($i % $batchSize) === 0) {
                // $this->logger->info("Updating names batch.");
                $this->em->flush();
                $this->em->clear(); // Detaches all objects from Doctrine!
            }
        }

        $this->em->flush(); // Persist objects that did not make up an entire batch
        $this->em->clear();
    }

    /**
     * Метод, который обновит имена групповых товаров из сайта
     *
     */
    private function updateShopGroupProductSkuNames()
    {
        $this->updateGroupNamesInChunks($this->magentoStorage->getGroupProductNames());
    }

}
