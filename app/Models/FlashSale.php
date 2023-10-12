<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class FlashSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', // Tambahkan 'product_id' ke daftar fillable
        'harga_flash_sale',
        'mulai_flash_sale',
        'selesai_flash_sale',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
