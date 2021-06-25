<?php

namespace App\Services;

use App\Helpers\ImagePathUtility;
use Psr\Log\LoggerInterface;
use App\Exceptions\ShopImagesException;
use App\Exceptions\FileManagerException;
use App\Helpers\ImageManager;
use App\Entities\ShopImage;
use App\Repositories\MagentoStorage;
use App\Repositories\CategoryRepository;
use App\Repositories\ShopImageRepository;
use App\Repositories\SupplierRepository;

class ShopImagesImporter
{
    /**
     * @var array
     */
    private $shopImages;

    public function __construct(
        private LoggerInterface $logger,
        private MagentoStorage $magentoStorage,
        private ShopImageRepository $shopImageRepository,
        private ImagePathUtility $imagePathUtility,
        private CategoryRepository $categoryRepository,
        private SupplierRepository $supplierRepository
    ) {

    }

    public function run()
    {
        $this->logger->info("Импортируем картинки...");
        try {
            $mageEntityIds = $this->magentoStorage->getProductEntityIds();
            $picfindEntityIds = $this->shopImageRepository->getProductEntityIds();

            $entityIdsToUpload = array_diff($mageEntityIds, $picfindEntityIds);

            //Возможно стоит удалить этот метод, зачем он нужен?
            $this->shopImageRepository->updateDop();

            if (!empty($mageEntityIds)) {
                $this->logger->info(
                    "Неимпортированных картинок: " . count($entityIdsToUpload)
                );
                array_map([$this, 'handleMagentoImage'], $entityIdsToUpload);
            }

            $this->logger->info("Картинки импортированы.");
        } catch (ShopImagesException $e) {
            $this->logger->error($e);
        }
    }

    /**
     * @param $entityId int
     */
    public function handleMagentoImage(int $entityId): bool
    {
        try {
            $newImage = $this->magentoStorage->getShopImageByEntityId($entityId);

            if (empty($newImage)) {
                return false;
            }

            if (!$this->imagePathUtility->isValidPDLXImgSubPath($newImage['image'])) {
                throw new ShopImagesException("Невалидная ссылка к изображению из сайта {$newImage['image']}");
            }

            /**
             * @var $shopImage ShopImage
             */
            $shopImage = $this->shopImageRepository->findOneBy(['entityId' => $newImage['entity_id']]);

            if ($shopImage != null && $shopImage->isImageDownloaded()) {
                return true;
            }

            if ($shopImage == null) {
                $shopImage = new ShopImage();
                $shopImage->setNameUpdatedAt(new \Datetime());
                $shopImage->setUpdatedAt(new \Datetime());
                $shopImage->setArtikul($newImage['artikul']);
                $shopImage->setEntityId($newImage['entity_id']);
                $this->shopImageRepository->insert($shopImage);
            }

            $shopImage->setArtikul($newImage['artikul']);
            $shopImage->setEntityId($newImage['entity_id']);
            $shopImage->setImage($this->imagePathUtility->sanitizeImgFileName($newImage['image']));
            $shopImage->setName($newImage['name']);
            $shopImage->setAttributeSet(
                $this->categoryRepository->findOneBy(['attributeSetId' => $newImage['attribute_set_id']])
            );
            $shopImage->setIsInStock($newImage['is_in_stock']);
            $shopImage->setPostavshik(
                $this->supplierRepository->findOneBy(['postavshik' => $newImage['postavshik']])
            );
            $shopImage->setNamePricelist($newImage['name_pricelist']);
            $shopImage->setUpakovka($newImage['upakovka']);

            if ($this->downloadImage($shopImage)) {
                $sizeArr = getimagesize($this->imagePathUtility->formImgFullPath($shopImage->getId()));
                $shopImage->setSizeX($sizeArr[0]);
                $shopImage->setSizeY($sizeArr[1]);
                $shopImage->setImgTut($this->imagePathUtility->formFilename($shopImage->getId()));
                $shopImage->setSizeXy($sizeArr[0] * $sizeArr[1]);
                $shopImage->setSizeTut(filesize($this->imagePathUtility->formImgFullPath($shopImage->getId())));
                $shopImage->setSkachan(true);
                $shopImage->setDop('new');
                $shopImage->setIsInStock(
                    (isset($newImage['is_in_stock']))
                        ? $newImage['is_in_stock'] : 0
                );
                $shopImage->setKGrey();
            } else {
                $shopImage->setSkachan(false);
                $shopImage->setDop('load error');
            }

            $this->shopImageRepository->update();
        } catch (\Exception $ex) {
            $this->logger->error($ex->getMessage());
        }

        return true;
    }

    /**
     *
     * @param ShopImage $image
     */
    private
    function downloadImage(
        ShopImage $image
    ): bool {
        try {
            $imgManager = new ImageManager(
                $this->imagePathUtility->formImgUrl(getenv("IMG_BASE_URL"), $image->getImage()),
                $this->imagePathUtility->formImgFullPath($image->getId())
            );
            $imgManager->copy();
            $imgManager->resize();

            $this->logger->info("Копирнули фотку: {$image->getImage()}");
            return true;
        } catch (FileManagerException $ex) {
            $this->logger->info($ex);
        }

        return false;
    }

}
