<?php

namespace App\Http\Controllers;

use App\Common\ResponseData;
use App\Domain\ShopImage\DTO\ShopImageData;
use App\Repositories\SupplierRepository;
use Inertia\Inertia;
use Spatie\DataTransferObject\DataTransferObject;

class SupplierController extends Controller
{
    private SupplierRepository $supplierRepository;

    /**
     * ApiController constructor.
     */
    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function index(int $showOnlyNew){
        return response()->json(
            $this->supplierRepository->findAllActiveSuppliers($showOnlyNew), 201
        );
    }



}
