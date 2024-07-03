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
            $table->string('title_product');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('image_product');
            $table->string('image_product1');
            $table->string('image_product2');
            $table->string('image_product3');
            $table->longText('description_product');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('active_region_id')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('active_region_id')->references('id')->on('regions')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
