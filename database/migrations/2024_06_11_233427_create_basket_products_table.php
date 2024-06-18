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
        Schema::create('basket_products', function (Blueprint $table) {
            $table->id();
            $table->integer('basket_id')->constrained('baskets')->onDelete('cascade');
            $table->integer('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('piece');
            $table->decimal('price', 8, 2);
            $table->json('images')->nullable();
            $table->mediumText('description');
            $table->longText('order_note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basket_products');
    }
};
