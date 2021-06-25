<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopImageCollection;
use App\Repositories\AsAttributeOptionRepository;
use App\Repositories\AsProductOptionRelationRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MagentoStorage;
use App\Repositories\ShopImageRepository;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Inertia\Inertia;

class AttributeSetterController extends Controller
{

    public function __construct(
        private SupplierRepository $supplierRepository,
        private CategoryRepository $categoryRepository,
        private ShopImageRepository $shopImageRepository,
        private AsAttributeOptionRepository $asAttributeOptionRepository,
        private AsProductOptionRelationRepository $asProductOptionRelationRepository,
        private MagentoStorage $magentoStorage)
    {}

    public function isOptionSet(int $productId, int $optionId){
        return Response::json(["isOptionSet" => $this->asProductOptionRelationRepository->isExistRelation($optionId, $productId)]);
    }

    public function create(int $productId, int $optionId)
    {
        $this->asProductOptionRelationRepository->save($optionId, $productId);
        // return Redirect::back();
        return "ok";
    }

    public function destroy(int $productId, int $optionId)
    {
        $params = Request::all();
        $this->asProductOptionRelationRepository->delete($optionId, $productId);
        // return Redirect::back();
        return "ok";
    }

    public function formReportData() {
        return Response::json($this->asProductOptionRelationRepository->formReport());
    }

    public function __invoke()
    {
        $params = Request::all('category', 'supplier', 'color', 'perPage');

        $products = [];
        $pageName = 'page';

        /**
         * Я не знаю как учесть все фильтры одновременно.
         * Если указан цвет, то будут проигнорированы остальные фильтры и наоборот.
         */

        if($params['color'] != null) {
            $products = new ShopImageCollection($this->shopImageRepository->paginateFindByColorId($params['color'],
                                                                                                  $params['perPage'], $pageName)->appends(Request::all()));
        }elseif($params['category'] != null && $params['supplier'] != null){
            $products = new ShopImageCollection($this->shopImageRepository->paginateFindByCatIdAndSupId($params['category'], $params['supplier'],
                                                                                                        $params['perPage'], $pageName)->appends(Request::all()));
        }elseif($params['category'] != null){
            $products = new ShopImageCollection($this->shopImageRepository->paginateFindByCatId($params['category'],
                                                                                                $params['perPage'], $pageName)->appends(Request::all()));
        }elseif ($params['supplier'] != null){
            $products = new ShopImageCollection($this->shopImageRepository->paginateFindBySupId($params['supplier'],
                                                                                                $params['perPage'], $pageName)->appends(Request::all()));
        }

        return Inertia::render('AttributeSetter/Index', [
            'filters' => $params,
            'suppliers' => $this->supplierRepository->findAllActiveSuppliers(0),
            'categories' => $this->categoryRepository->findAllArr(),
            'products' => $products,
            'colorOptions' => $this->asAttributeOptionRepository->findAllColorOptions(),
            'styleOptions' => $this->asAttributeOptionRepository->findAllStyleOptions(),
            'pictureOptions' => $this->asAttributeOptionRepository->findAllPictureOptions(),
        ]);
    }

    public function getImagesByEntityId(int $entityId) {
        return Response::json($this->magentoStorage->getImagesByEntityId($entityId));
    }

}
