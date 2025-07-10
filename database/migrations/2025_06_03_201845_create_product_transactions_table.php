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
        Schema::create('product_transactions', function (Blueprint $table) {
            $table->id();
            $table->String('address');
            $table->String('post_code');
            $table->String('city');
            $table->String('proof');
            $table->String('phone_number');
            $table->boolean('is_paid');
            $table->unsignedBigInteger('total_amount'); //harga tidak bisa negatif
            $table->text('notes');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //data yg berhubungan dengan category_id ikut terhapus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_transactions');
    }
};
