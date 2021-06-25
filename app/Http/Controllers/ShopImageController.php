<?php

namespace App\Http\Controllers;

use App\Common\ResponseData;
use App\Domain\ShopImage\DTO\ShopImageData;
use App\Repositories\CategoryRepository;
use App\Repositories\ShopImageRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ShopImageController extends Controller
{

    public function __construct(private ShopImageRepository $shopImageRepository)
    {}

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function find(string $sku){
        $data = [];
        $shopImage = $this->shopImageRepository->findBySku($sku);
        if($shopImage !=null)
        {
            $data = ShopImageData::fromEntity($shopImage);
        }

        return new ResponseData(
            data: $data,
        );
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function findInertia(string $sku){
        $shopImage = $this->shopImageRepository->findBySku($sku);

        return Inertia::render('CheckSku/Index', [
            'product' =>  ($shopImage !=null) ? ShopImageData::fromEntity($shopImage)->toArray() : [],
        ]);
    }

    public function getUngroupedCnt() {
        return $this->shopImageRepository->getUngroupedProductsCnt();
    }

    public function changeSubGroup(Request $request) {
        $params = json_decode($request->getContent(), true);
        $this->shopImageRepository->moveSku($params['sku'], $params['option']);
    }

    public function changedCategorizeOption(Request $request)
    {
        $params = $this->getPostParams($request);
        if ($params['option'] === "new") {
            $this->shopImageRepository->makeAsNewSku($params['sku']);
        } elseif ($params['option'] === "notFit") {
            $this->shopImageRepository->makeAsNotFitSku($params['sku']);
        } elseif ($params['option'] === "remake") {
            $this->shopImageRepository->gotoRemakeSku($params['sku']);
        } else {
            $this->changeSubGroup($request);
        }
    }

    public function renameSkuName(Request $request)
    {
        $params = $this->getPostParams($request);
        $this->shopImageRepository->renameSkuName($params['sku'], $params['skuName']);
    }

    public function changeSubGroupName(Request $request)
    {
        $params = $this->getPostParams($request);
        $this->shopImageRepository->changeSubGroupName($params['grtov'], $params['grtovName']);
    }

    public function formReport(int $unixTime = 0)
    {
        $report = $this->shopImageRepository->formReport($unixTime);
        return gzdeflate(json_encode($report), 6);
    }

    public function formReportJson(int $unixTime = 0)
    {
        $report = $this->shopImageRepository->formReport($unixTime);
        return json_encode($report);
    }


    public function findByParams(int $supplierId, int $categoryId)
    {
        return Inertia::render('AttributeSetter/Index', [
            'products' =>  $this->shopImageRepository->findByCatId($categoryId),

        ]);
    }
}
