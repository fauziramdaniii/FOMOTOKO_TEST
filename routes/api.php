<?php

use App\Http\Controllers\FlashSaleController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ItemPesananController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Pesanan
Route::resource('pesanan', PesananController::class);

// Item Pesanan Berdasarkan Pesanan
Route::get('item-pesanan/{pesanan_id}', [ItemPesananController::class, 'index']);
Route::post('item-pesanan/{pesanan_id}', [ItemPesananController::class, 'store']);
Route::get('api/item-pesanan/{pesanan_id}/{item_pesanan_id}', 'ItemPesananController@show');
Route::put('api/item-pesanan/{pesanan_id}/{item_pesanan_id}', 'ItemPesananController@update');
Route::delete('api/item-pesanan/{pesanan_id}/{item_pesanan_id}', 'ItemPesananController@destroy');

// Product + FlashSale
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('flash-sales', [FlashSaleController::class, 'store']);
