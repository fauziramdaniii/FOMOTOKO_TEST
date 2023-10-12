<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FlashSale;

class Product extends Model
{
    use HasFactory;
    public function flashSale()
    {
        return $this->hasOne(FlashSale::class);
    }
}
