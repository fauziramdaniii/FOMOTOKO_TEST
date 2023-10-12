<?php

namespace App\Models;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemPesanan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_barang', 'jumlah', 'pesanan_id'];
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
