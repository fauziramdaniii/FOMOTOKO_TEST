<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    // Pesanan.php
    protected $fillable = ['nama_pelanggan', 'alamat_pengiriman'];
    public function items()
    {
        return $this->hasMany(ItemPesanan::class);
    }
}
