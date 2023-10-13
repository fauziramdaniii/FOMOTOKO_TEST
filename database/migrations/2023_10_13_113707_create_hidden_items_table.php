<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hidden_items', function (Blueprint $table) {
            $table->id();
            $table->json('grid');
            $table->integer('player_x');
            $table->integer('player_y');
            $table->json('steps');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hidden_items');
    }
};
