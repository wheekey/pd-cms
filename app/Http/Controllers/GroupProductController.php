<?php

namespace App\Http\Controllers;

use App\Repositories\GroupImageRepository;
use App\Repositories\ShopImageRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GroupProductController extends Controller
{

    private ShopImageRepository $shopImageRepository;

    /**
     * ApiController constructor.
     */
    public function __construct(ShopImageRepository $shopImageRepository)
    {

        $this->shopImageRepository = $shopImageRepository;
    }

    public function removeSubGroup(Request $request)
    {
        $params = $this->getPostParams($request);
        $this->shopImageRepository->removeSubGroup($params['grtov']);
    }

    public function createSubGroup(Request $request)
    {
        $params = $this->getPostParams($request);
        $this->shopImageRepository->createSubGroup($params['grimg'], $params['grtovName']);
    }
}
