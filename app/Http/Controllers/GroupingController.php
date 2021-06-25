<?php

namespace App\Http\Controllers;

use App\Repositories\GroupImageRepository;
use Inertia\Inertia;

class GroupingController extends Controller
{



    public function __invoke()
    {
        return Inertia::render('Grouping/Index');
    }


}
