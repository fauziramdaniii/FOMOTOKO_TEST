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
            'harga' => 100.00,
            'diskon' => 10.00,
            'mulai_flash_sale' => now(),
            'selesai_flash_sale' => now()->addHours(4),
        ]);

        Product::create([
            'nama' => 'Produk 2',
            'harga' => 80.00,
            'diskon' => 5.00,
            'mulai_flash_sale' => now(),
            'selesai_flash_sale' => now()->addHours(3),
        ]);

        // Tambahkan produk lain sesuai kebutuhan
    }
}
