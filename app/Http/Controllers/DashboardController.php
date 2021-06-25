<?php

namespace App\Http\Controllers;

use App\Repositories\GroupImageRepository;
use Inertia\Inertia;

class DashboardController extends Controller
{



    public function __invoke()
    {
        return Inertia::render('Dashboard/Index');
    }


}
