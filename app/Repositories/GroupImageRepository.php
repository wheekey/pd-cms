<?php

namespace App\Repositories;

use App\Entities\GroupImage;
use App\Entities\ShopImage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GroupImageRepository
{
    public function create(GroupImage $groupImage): GroupImage;
    public function getGroupId(): int;
    public function getPagesCnt(int $supplier, bool $showOnlyNew, string $skuFind): int;
    /**
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\Exception
     */
    public function getGroups(string $supplier, bool $showOnlyNew, int $pageNumber, string $skuFind): array;

    public function findByImage(int $shopImageId): array;
}
