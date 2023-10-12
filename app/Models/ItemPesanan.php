<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPesanan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_barang', 'jumlah', 'pesanan_id'];
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
