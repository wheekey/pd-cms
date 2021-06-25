<?php

use App\Http\Controllers\AttributeSetterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupImageController;
use App\Http\Controllers\GroupProductController;
use App\Http\Controllers\ShopImageController;
use App\Repositories\ShopImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('suppliers/{showOnlyNew}', [SupplierController::class, 'index']);
Route::get('products/{sku}/find', [ShopImageController::class, 'find']);
Route::get('pager/{supplier}/{showOnlyNew}/{skuFind?}', [GroupImageController::class, 'getSupplierPagesCnt']);
Route::get('groups/{supplier}/{showOnlyNew}/{pageNumber}/{skuFind?}', [GroupImageController::class, 'getGroups']);
Route::get('products/getUngroupedCnt', [ShopImageController::class, 'getUngroupedCnt']);

Route::post('product/changeSubGroup', [ShopImageController::class, 'changeSubGroup']);
Route::post('product/changedCategorizeOption', [ShopImageController::class, 'changedCategorizeOption']);
Route::post('product/renameSkuName', [ShopImageController::class, 'renameSkuName']);
Route::post('product/changeSubGroupName', [ShopImageController::class, 'changeSubGroupName']);


Route::get('attribute-setter/isOptionSet/{productId}/{optionId}', [AttributeSetterController::class, 'isOptionSet']);


Route::post('removeSubGroup', [GroupProductController::class, 'removeSubGroup']);
Route::post('createSubGroup', [GroupProductController::class, 'createSubGroup']);


Route::get('formReport/{unixTime?}', [ShopImageController::class, 'formReport']);
Route::get('formReportJson/{unixTime?}', [ShopImageController::class, 'formReportJson']);


Route::get('attribute-setter/products/{productId}/options/{optionId}')->name('attribute-setter.create')->uses('\App\Http\Controllers\AttributeSetterController@create');
Route::get('attribute-setter/images/{entityId}')->uses('\App\Http\Controllers\AttributeSetterController@getImagesByEntityId');
Route::get('attribute-setter/formReportData')->uses('\App\Http\Controllers\AttributeSetterController@formReportData');


Route::delete('attribute-setter/products/{productId}/options/{optionId}')->name('attribute-setter.destroy')->uses('\App\Http\Controllers\AttributeSetterController@destroy');

Route::post('category-setter/set', [\App\Http\Controllers\CategorySetterController::class, 'create']);






