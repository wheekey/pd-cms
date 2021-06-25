<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use App\Repositories\MagentoStorage;

use App\Repositories\CategoryRepository;


class OldCatsRemover
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
        $this->logger->info("Удаляем старые категории...");
        $picfindCatIds = $this->categoryRepository->getCatIds();
        $mageCatIds = $this->magentoStorage->getCatIds();

        //Если будут сравниваться инты, то полезут ошибки и удалятся не старые категории.
        if (!empty($mageCatIds) && !empty($picfindCatIds)) {
            $this->categoryRepository->deleteOldCats(array_diff($picfindCatIds, $mageCatIds));
        }
        $this->logger->info("Удаление старых категорий завершено.");
    }
}
