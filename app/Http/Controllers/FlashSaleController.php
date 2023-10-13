<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlashSaleController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input request di sini sesuai kebutuhan
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'harga_flash_sale' => 'required|numeric',
            'mulai_flash_sale' => 'required|date',
            'selesai_flash_sale' => 'required|date|after:mulai_flash_sale',
        ]);

        // Cek apakah produk sudah ada flash sale yang berlangsung
        $product = Product::find($request->product_id);
        if ($product->flashSale) {
            return response()->json(['message' => 'Produk sudah dalam flash sale'], 422);
        }

        if ($product->stock < 1) {
            return response()->json(['message' => 'Stock Produk Habis'], 422);
        }

        // Buat flash sale baru
        $flashSale = FlashSale::create([
            'product_id' => $request->product_id,
            'harga_flash_sale' => $request->harga_flash_sale,
            'mulai_flash_sale' => $request->mulai_flash_sale,
            'selesai_flash_sale' => $request->selesai_flash_sale,
        ]);

        return response()->json($flashSale, 201);
    }
}
