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
            $table->string('product_id')->nullable()->unique();
            $table->string('model',512)->nullable();
            $table->string('name',512)->nullable();
            $table->boolean('status')->nullable()->default(1);
            $table->boolean('tax_include')->nullable()->default(1);
            $table->integer('tax_rate')->nullable()->default(0);
            $table->integer('desi')->nullable()->default(0);
            $table->integer('stock')->nullable()->default(0);
            $table->integer('shipping_include')->nullable()->default(0);
            $table->longText('description')->nullable();
            $table->string('category_name',512)->nullable();
            $table->string('manufacturer',512)->nullable();
            $table->string('image',512)->nullable();
            $table->string('image_source',512)->nullable();
            $table->integer('category_id')->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('buy_price', 8, 2);
            $table->decimal('sell_price', 8, 2);
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
