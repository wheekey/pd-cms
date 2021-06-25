<?php

namespace App\Services;

use App\Entities\GroupImage;
use App\Entities\GroupProduct;
use App\Entities\ShopImage;
use App\Repositories\GroupImageRepository;
use App\Repositories\GroupProductRepository;
use App\Repositories\ShopImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use App\Exceptions\ShopImagesException;
use App\Repositories\MagentoStorage;
use App\Repositories\CategoryRepository;


/**
 * Класс, который склеит группы
 *
 * Class GroupsMerger
 * @package App\Services
 */
class GroupsMerger
{

    public function __construct(
        private ShopImageRepository $shopImageRepository,
        private GroupProductRepository $groupProductRepository,
        private GroupImageRepository $groupImageRepository,
        private EntityManagerInterface $entityManager,
        private LoggerInterface $logger
    ) {}

    private function updateGroupProductGroupImageId(GroupImage $currentGroupImage, GroupImage $mergeToGroupImage){
        $groupProducts = $this->groupProductRepository->findBy(['groupImage' =>$currentGroupImage]);

        /* @var $groupProduct GroupProduct */
        foreach ($groupProducts as $groupProduct){
            $groupProduct->setGroupImage($mergeToGroupImage);
            $this->entityManager->persist($groupProduct);
        }

        $this->entityManager->flush();
    }

    private function updateShopImageGroupImageId(GroupImage $currentGroupImage, GroupImage $mergeToGroupImage){
        $shopImages = $this->shopImageRepository->findBy(['groupImage' =>$currentGroupImage]);

        /* @var $shopImage ShopImage */
        foreach ($shopImages as $shopImage){
            $shopImage->setGroupImage($mergeToGroupImage);
            $this->entityManager->persist($shopImage);
        }
        $this->entityManager->flush();
    }

    public function merge(int $groupImageId, int $mergeToGroupImageId)
    {
        //1) Сначала достаем GroupProducts со старым groupImageId
        //2) Обновляем grimg в GroupProduct ($groupImageId на $mergeToGroupImageId)
        //3) Обновить ShopImage со старым groupImageId (grimg_id поставить на $mergeToGroupImageId)

        /* @var GroupImage */
        $mergeToGroupImage = $this->groupImageRepository->findOneBy(['id' => $mergeToGroupImageId]);
        /* @var GroupImage */
        $currentGroupImage = $this->groupImageRepository->findOneBy(['id' => $groupImageId]);

        try {
            $this->entityManager->transactional(
                function () use ( $mergeToGroupImage, $currentGroupImage) {
                    $this->updateGroupProductGroupImageId($currentGroupImage, $mergeToGroupImage);
                    $this->updateShopImageGroupImageId($currentGroupImage, $mergeToGroupImage);
                }
            );
        } catch (\Exception $e) {
            $this->logger->warning($e->getMessage());
        }

    }

}
