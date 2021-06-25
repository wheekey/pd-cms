<?php

namespace App\Http\Controllers;

use App\Repositories\GroupImageRepository;
use Inertia\Inertia;

class GroupImageController extends Controller
{

    private GroupImageRepository $groupImageRepository;

    public function __construct(GroupImageRepository $groupImageRepository)
    {
        $this->groupImageRepository = $groupImageRepository;
    }

    public function __invoke()
    {
        return Inertia::render('Dashboard/Index');
    }

    public function getSupplierPagesCnt(int $supplier, bool $showOnlyNew, string $skuFind = '')
    {
        return $this->groupImageRepository
            ->getPagesCnt($supplier, $showOnlyNew, $skuFind);
    }

    public function getGroups(int $supplier, bool $showOnlyNew, int $pageNumber, string $skuFind = ''){
        return response()->json( $this->groupImageRepository->getGroups($supplier, $showOnlyNew, $pageNumber, $skuFind));
    }
}
