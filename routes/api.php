<?php

use App\Http\Controllers\PesananController;
use App\Http\Controllers\ItemPesananController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('pesanan', PesananController::class);

Route::get('item-pesanan/{pesanan_id}', [ItemPesananController::class, 'index']);
Route::post('item-pesanan/{pesanan_id}', [ItemPesananController::class, 'store']);
Route::get('api/item-pesanan/{pesanan_id}/{item_pesanan_id}', 'ItemPesananController@show');
Route::put('api/item-pesanan/{pesanan_id}/{item_pesanan_id}', 'ItemPesananController@update');
Route::delete('api/item-pesanan/{pesanan_id}/{item_pesanan_id}', 'ItemPesananController@destroy');

Route::get('products', [ProductController::class, 'index']);
Route::put('products/{productId}/flash-sale', [ProductController::class, 'enableFlashSale']);
Route::post('products', [ProductController::class, 'store']);
