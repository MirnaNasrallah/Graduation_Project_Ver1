<?php

use App\Http\APIs\CartApi;
use App\Http\APIs\LoginApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [LoginApi::class, 'login']);
Route::post('register', [RegisterApi::class, 'register']);
Route::get('cart', [CartApi::class, 'cart']);
Route::get('wishlist', [WishlistApi::class, 'wishlist']);

/////////////////////////ADMIN APIs////////////////////////////////////
Route::post('storeWear', [AdminApi::class, 'storeWear']);
Route::put('updateWear/{id}', [AdminApi::class, 'updateWear']);
Route::get('destroyWear/{id}', [AdminApi::class, 'destroyWear']);
//////////////////////FILTERS//////////////////////////////
Route::get('/Medicine', [FiltersApi::class, 'shopMedicine']);
Route::get('/priceLimitDrugs', [FiltersApi::class, 'priceLimitDrugs']);
