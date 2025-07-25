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
            $table->String('name');
            $table->String('slug');
            $table->String('photo');
            $table->unsignedBigInteger('price'); //harga tidak bisa negatif
            $table->text('about');
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); //data yg berhubungan dengan category_id ikut terhapus
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
