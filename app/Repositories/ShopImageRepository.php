<?php

namespace App\Repositories;

use App\Entities\Supplier;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use App\Domain\AlgorithmHelper;
use App\Exceptions\GrimgCantBeCreatedException;
use App\Exceptions\GrimgNotFoundException;
use App\Entities\ShopImage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ShopImageRepository
{
    public function create(ShopImage $image): void;
    public function update();
    public function delete(int $id);
    public function insert(ShopImage $image);
    public function deleteOldSkus(array $entityIds);
    public function getUngroupedProductsCnt(): int;
    public function updateDop();

    public function moveSku(string $sku, int $grtov);
    public function findBySku(string $sku);
    public function findByCatId(int $categoryId);
    public function findBySupId(int $supplierId);
    public function findByCatIdAndSupId(int $categoryId, int $supplierId);

    public function makeAsNewSku(string $sku);

    public function makeAsNotFitSku(string $sku);

    public function gotoRemakeSku(string $sku);

    public function renameSkuName(string $sku, string $skuName);

    public function removeSubGroup(int $grtov);

    public function createSubGroup(int $grimg, string $grtovName);

    public function changeSubGroupName(int $grtov, string $grtovName);

    public function getProductEntityIds(): array;

    public function findAllNew(): array;

    public function formReport(int $unixTime): array;


    /**
     * @return ShopImage[]|LengthAwarePaginator
     */
    public function paginateFindByCatId(int $categoryId, int $perPage, string $pageName): LengthAwarePaginator;

    /**
     * @return ShopImage[]|LengthAwarePaginator
     */
    public function paginateFindBySupId(int $supplierId, int $perPage, string $pageName): LengthAwarePaginator;

    /**
     * @return ShopImage[]|LengthAwarePaginator
     */
    public function paginateFindByCatIdAndSupId(int $categoryId, int $supplierId, int $perPage, string $pageName): LengthAwarePaginator;

    /**
     * @return ShopImage[]|LengthAwarePaginator
     */
    public function paginateFindByColorId(int $colorId, int $perPage, string $pageName): LengthAwarePaginator;



    /**
     * @return ShopImage[]|LengthAwarePaginator
     */
    public function paginateFindSimilarImageGroupsByImage(int $perPage, string $pageName): LengthAwarePaginator;


    public function findAllUngroupedBySupplier(Supplier $supplier): array;

    /**
     * Тот самый алгоритм группировки
     * @param $level - По всей видимости - это регулятор алгоритма, который формирует выборку совпавших
     * @return array
     * @throws GrimgCantBeCreatedException
     */
    public function findGrimgForUngroupedSku(array $shopImageRow, int $level, Supplier $supplier): int;

    public function findAllSimilarUngroupedSkus(array $shopImageRow, int $level, Supplier $supplier): array;

    //Category Setter
    public function findOneNotSetCategory(array $params): ?ShopImage;

}
