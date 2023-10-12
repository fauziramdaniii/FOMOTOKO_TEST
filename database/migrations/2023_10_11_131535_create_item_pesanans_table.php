<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // create_item_pesanan_table.php
    public function up()
    {
        Schema::create('item_pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('pesanans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_pesanans');
    }
};
