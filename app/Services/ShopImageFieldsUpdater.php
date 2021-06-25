<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\SupplierRepository;
use Doctrine\ORM\EntityManagerInterface;

use Psr\Log\LoggerInterface;
use App\Entities\ShopImage;
use App\Repositories\MagentoStorage;
use App\Repositories\ShopImageRepository;

class ShopImageFieldsUpdater
{

    /**
     * ShopImageFieldsUpdater constructor.
     */
    public function __construct(
        private MagentoStorage $magentoStorage,
        private LoggerInterface $logger,
        private EntityManagerInterface $em,
        private SupplierRepository $supplierRepository,
        private CategoryRepository $categoryRepository,
        private ShopImageRepository $shopImageRepository
    ) {

    }

    private function updateMainImageLinks()
    {
        $imageLinks = $this->magentoStorage->getMagentoImageLinks();
        $this->logger->info("Получили ссылки на фото.");
        $this->updateInChunks($imageLinks, [$this, 'updateEntityImage']);
    }

    private function updateNamePricelists()
    {
        $names = $this->magentoStorage->getMagentoPriceListNames();
        $this->updateInChunks($names, [$this, 'updateEntityNamePricelist']);
    }

    private function updateUpakovka()
    {
        $upakovkaValues = $this->magentoStorage->getUpakovka();
        $this->updateInChunks($upakovkaValues, [$this, 'updateEntityUpakovka']);
    }

    private function updatePostavshik()
    {
        $postavshikValues = $this->magentoStorage->getPostavshik();
        $this->updateInChunks($postavshikValues, [$this, 'updateEntityPostavshik']);
    }

    private function updateAttributeSet()
    {
        $attributeSets = $this->magentoStorage->getAttributeSet();
        $this->updateInChunks($attributeSets, [$this, 'updateEntityAttributeSet']);
    }

    private function updateEntityAttributeSet(ShopImage $shopImage, array $productInfo)
    {
        $shopImage->setAttributeSet(
            $this->categoryRepository->findOneBy(["attributeSetId" => $productInfo['attribute_set_id']])
        );
        $shopImage->setUpdatedAt(new \Datetime());
    }

    private function updateEntityPostavshik(ShopImage $shopImage, array $productInfo)
    {
        $shopImage->setPostavshik(
            $this->supplierRepository->findOneBy(["postavshik" => $productInfo['postavshik']])
        );
        $shopImage->setUpdatedAt(new \Datetime());
    }

    private function updateEntityUpakovka(ShopImage $shopImage, array $productInfo)
    {
        $shopImage->setUpakovka($productInfo['upakovka']);
        $shopImage->setUpdatedAt(new \Datetime());
    }

    private function updateEntityImage(ShopImage $shopImage, array $productInfo)
    {
        $shopImage->setImage($productInfo['image']);
        $shopImage->setUpdatedAt(new \Datetime());
    }

    private function updateEntityNamePricelist(ShopImage $shopImage, array $productInfo)
    {
        $shopImage->setNamePricelist($productInfo['name_pricelist']);
        $shopImage->setUpdatedAt(new \Datetime());
    }

    private function updateInChunks(array $magentoProductsInfo, callable $updateFieldShopImage)
    {
        $batchSize = 500;
        for ($i = 0; $i < count($magentoProductsInfo); ++$i) {
            $productInfo = $magentoProductsInfo[$i];
            $shopImage = $this->findShopImageByEntityId($productInfo["entity_id"]);


            if ($shopImage !== null) {
                $updateFieldShopImage($shopImage, $productInfo);
                $this->em->persist($shopImage);
                if (($i % $batchSize) === 0) {
                    $this->em->flush();
                    $this->em->clear(); // Detaches all objects from Doctrine!
                }
            }


        }
        $this->em->flush(); // Persist objects that did not make up an entire batch
        $this->em->clear();
    }

    private function findShopImageByEntityId(int $entityId): ?ShopImage
    {
        return $this->shopImageRepository->findOneBy(["entityId" => $entityId]);
    }

    public function update()
    {
        $this->logger->info("Обновляем данные по товарам");
        $this->updateMainImageLinks();
        $this->updateNamePricelists();
        $this->updateUpakovka();
        $this->updatePostavshik();
        $this->updateAttributeSet();
        $this->logger->info("Обновление данных завершено.");
    }

}
