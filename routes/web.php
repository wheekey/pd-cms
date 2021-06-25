<?php

use App\Http\Controllers\ShopImageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard
Route::get('/')->name('dashboard')->uses('\App\Http\Controllers\DashboardController@__invoke')->middleware('auth');

// Check sku
Route::get('check-sku')->name('check-sku')->uses('\App\Http\Controllers\CheckSkuController@index')->middleware('auth');

// Grouping
Route::get('grouping')->name('grouping')->uses('\App\Http\Controllers\GroupingController');

// Attribute Setter
Route::get('attribute-setter')->name('attribute-setter')->uses('\App\Http\Controllers\AttributeSetterController')->middleware('remember');

/*Route::get('attribute-setter/{productId}')->name('attribute-setter.create')->uses('\App\Http\Controllers\AttributeSetterController@create');
Route::delete('attribute-setter/products/{productId}/options/{optionId}')->name('attribute-setter.destroy')->uses('\App\Http\Controllers\AttributeSetterController@destroy');*/

Route::get('products/{sku}/find')->name('products.find')->uses('\App\Http\Controllers\ShopImageController@findInertia');

// Users
Route::get('users')->name('users')->uses('\App\Http\Controllers\UsersController@index')->middleware('remember', 'auth');
Route::get('users/create')->name('users.create')->uses('\App\Http\Controllers\UsersController@create')->middleware('auth');
Route::post('users')->name('users.store')->uses('\App\Http\Controllers\UsersController@store')->middleware('auth');
Route::get('users/{userId}/edit')->name('users.edit')->uses('\App\Http\Controllers\UsersController@edit')->middleware('auth');
Route::put('users/{userId}')->name('users.update')->uses('\App\Http\Controllers\UsersController@update')->middleware('auth');
Route::delete('users/{user}')->name('users.destroy')->uses('\App\Http\Controllers\UsersController@destroy')->middleware('auth');
Route::put('users/{user}/restore')->name('users.restore')->uses('\App\Http\Controllers\UsersController@restore')->middleware('auth');

// Auth::routes();

// Auth
Route::get('login')->name('login')->uses('\App\Http\Controllers\Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('login')->name('login.attempt')->uses('\App\Http\Controllers\Auth\LoginController@login')->middleware('guest');
Route::post('logout')->name('logout')->uses('\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Groups Merger
Route::get('groups-merger')->name('groups-merger')->uses('\App\Http\Controllers\GroupsMergerController')->middleware('remember');
Route::get('groups-merger/{shopImageId}/edit')->name('groups-merger.edit')->uses('\App\Http\Controllers\GroupsMergerController@edit')->middleware('remember');
Route::put('groups-merger/{groupImageId}/update/{mergeToGroupImageId}')->name('groups-merger.merge')->uses('\App\Http\Controllers\GroupsMergerController@merge')->middleware('auth');

// Category Setter
Route::get('category-setter')->name('category-setter')->uses('\App\Http\Controllers\CategorySetterController')->middleware('remember');
Route::delete('category-setter/product', [\App\Http\Controllers\CategorySetterController::class, 'deleteProduct'])->name('category-setter.delete-product');
