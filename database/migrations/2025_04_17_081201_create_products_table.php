<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //deskripsi
            $table->string('description')->nullable();
            //harga
            $table->string('price')->default(0);
            //stocl
            $table->string('stock')->default(0);
            //kategori enum (food,drink,snak)
            $table->enum('category', ['food','drink','snack']);
            //gambar
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
