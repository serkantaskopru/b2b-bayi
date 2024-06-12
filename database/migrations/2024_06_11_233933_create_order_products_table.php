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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->constrained('orders')->onDelete('cascade');
            $table->integer('product_id');
            $table->integer('piece')->nullable()->default(1);
            $table->string('name', 1024)->nullable();
            $table->string('image', 1024)->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('dealer_sales_price', 8, 2);
            $table->decimal('total_sales_price', 8, 2);
            $table->decimal('dealer_commission', 8, 2);
            $table->decimal('company_commission', 8, 2);
            $table->text('description')->nullable();
            $table->text('product_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
