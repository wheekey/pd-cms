<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CheckSkuController extends Controller
{
    public function index()
    {
        return Inertia::render('CheckSku/Index', [
            'world' => 'hello world'
        ]);
    }
}
