<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupImageCollection;
use App\Http\Resources\ShopImageCollection;
use App\Repositories\AsProductOptionRelationRepository;
use App\Repositories\GroupImageRepository;
use App\Repositories\ShopImageRepository;
use App\Repositories\SupplierRepository;
use App\Services\GroupsMerger;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Inertia\Inertia;

class GroupsMergerController extends Controller
{

    public function __construct(
        private ShopImageRepository $shopImageRepository,
        private GroupImageRepository $groupImageRepository,
        private GroupsMerger $groupsMerger)
    {}

    public function __invoke()
    {
        $params = Request::all();
        $pageName = 'page';

        $rr = new ShopImageCollection($this->shopImageRepository
                                          ->paginateFindSimilarImageGroupsByImage(
                                              20,
                                              $pageName)
                                          ->appends(Request::all()));

        return Inertia::render('GroupsMerger/Index', [
            'filters' => $params,
            'images' => $rr,
        ]);
    }

    public function edit(int $shopImageId)
    {
        $params = Request::all();

        $gri = new GroupImageCollection(
            $this->groupImageRepository
                ->findByImage($shopImageId)
        );


        return Inertia::render('GroupsMerger/Edit', [
            'filters' => $params,
            'groupImages' => $gri
        ]);
    }

    public function merge(int $groupImageId, int $mergeToGroupImageId)
    {
        $this->groupsMerger->merge($groupImageId, $mergeToGroupImageId);
        return Redirect::back()->with('success', 'Organization updated.');
    }



}
