<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(['products' => $products], 200);
    }

    public function enableFlashSale(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        // Hitung harga diskon berdasarkan persentase diskon yang diberikan dalam permintaan
        $discountPercentage = $request->input('discount_percentage', 0); // Anda dapat mengirim persentase diskon dalam permintaan

        if ($discountPercentage < 0 || $discountPercentage > 100) {
            return response()->json(['message' => 'Persentase diskon tidak valid'], 400);
        }

        $discountedPrice = $product->price - ($product->price * ($discountPercentage / 100));

        $product->discounted_price = $discountedPrice;
        $product->save();

        return response()->json(['message' => 'Flash sale diaktifkan dengan diskon ' . $discountPercentage . '%'], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        $product->save();

        return response()->json(['message' => 'Produk telah berhasil ditambahkan'], 201);
    }
}
