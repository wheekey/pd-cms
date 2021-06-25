<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use App\Exceptions\ShopImagesException;
use App\Repositories\MagentoStorage;
use App\Repositories\CategoryRepository;


/**
 * Класс, который обновит список категорий.
 *
 * Class CategoriesUpdater
 * @package App\Services
 */
class CategoriesUpdater
{
    /**
     * @var MagentoStorage
     */
    private $magentoStorage;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        MagentoStorage $magentoStorage,
        CategoryRepository $categoryRepository,
        LoggerInterface $logger
    ) {
        $this->magentoStorage = $magentoStorage;
        $this->categoryRepository = $categoryRepository;
        $this->logger = $logger;
    }

    public function run()
    {
        $this->logger->info("Обновляем категории...");
        $result = $this->magentoStorage->getCategories();

        if (!$result) {
            throw new ShopImagesException("Не приходят категории из сайта.");
        }
        $this->logger->info("Получили из магенты категории. Всего: " . count($result));
        foreach ($result as $mageCategory) {
            $this->categoryRepository->insertOrUpdate(
                (int)$mageCategory['attribute_set_id'],
                $mageCategory['attribute_set_name']
            );
        }
        $this->logger->info("Готово.");
    }

}
