<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('flash_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained(); // Foreign key ke produk yang terkait
            $table->decimal('harga_flash_sale', 10, 2); // Harga selama flash sale
            $table->timestamp('mulai_flash_sale')->nullable(false)->default(now()); // Timestamp awal flash sale
            $table->timestamp('selesai_flash_sale')->nullable(false)->default(now()); // Timestamp akhir flash sale
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flash_sales');
    }
};
