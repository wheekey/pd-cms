<?php

namespace App\Http\Controllers;


use App\Entities\CategorySetter\ProductCategoryRelation;
use App\Http\Resources\ManufacturerCollection;
use App\Repositories\CategoryRepository;
use App\Repositories\CategorySetter\ProductCategoryRelationRepository;
use App\Repositories\MagentoStorage;
use App\Repositories\ManufacturerRepository;
use App\Repositories\ShopImageRepository;
use App\Repositories\SupplierRepository;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CategorySetterController extends Controller
{

    public function __construct(
        private SupplierRepository $supplierRepository,
        private CategoryRepository $categoryRepository,
        private ManufacturerRepository $manufacturerRepository,
        private ShopImageRepository $shopImageRepository,
        private MagentoStorage $magentoStorage,
        private ProductCategoryRelationRepository $productCategoryRelationRepository)
    {}

    public function create()
    {
        $params = Request::all();

        $obj = new ProductCategoryRelation();
        $obj->setShopImage($this->shopImageRepository->findOneBy(['id' => $params['shop_image_id']]));
        $obj->setCategory($this->categoryRepository->findOneBy(['id' => $params['attribute_set_id']]));

        $this->productCategoryRelationRepository->create($obj);
    }

    public function deleteProduct()
    {
        $params = Request::all('id');

        $this->shopImageRepository->delete($params['id']);
        return Redirect::back();
    }

    public function __invoke()
    {
        $params = Request::all('manufacturer', 'supplier');

        /**
         * Я не знаю как учесть все фильтры одновременно.
         * Если указан цвет, то будут проигнорированы остальные фильтры и наоборот.
         */
        return Inertia::render('CategorySetter/Index', [
            'filters' => $params,
            'suppliers' => $this->supplierRepository->findAllActiveSuppliers(0),
            'manufacturers' => new ManufacturerCollection($this->manufacturerRepository->findBy(
                [],
                ['id' => 'DESC'],
                10,
                0
            )),
            'product' => $this->shopImageRepository->findOneNotSetCategory($params)?->toArray(),
            'categories' => $this->categoryRepository->findDecorCats()

            // на проде вернуть это
            // 'manufacturers' => new ManufacturerCollection($this->manufacturerRepository->findAll()),
        ]);
    }

}
