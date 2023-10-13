<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan contoh produk ke database
        Product::create([
            'nama' => 'Produk 1',
            'harga' => 100000,
            'stock' => 10,
            'diskon' => 10,
        ]);

        Product::create([
            'nama' => 'Produk 2',
            'stock' => 5,
            'harga' => 8000,
            'diskon' => 5,
        ]);

        // Tambahkan produk lain sesuai kebutuhan
    }
}
