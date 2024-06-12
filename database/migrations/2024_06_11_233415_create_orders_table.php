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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no', 64);
            $table->dateTime('date')->nullable();
            $table->integer('dealer_id')->constrained('dealers')->onDelete('cascade');
            $table->integer('user_id')->constrained('users')->onDelete('cascade');
            $table->string('customer_name', 128)->nullable();
            $table->string('customer_phone', 32)->nullable();
            $table->string('customer_mail', 64)->nullable();
            $table->text('customer_address')->nullable();
            $table->mediumText('gift_message')->nullable();
            $table->boolean('invoice_send')->nullable();
            $table->boolean('send_sms_to_customer')->nullable();
            $table->boolean('is_abroad')->nullable();
            $table->tinyInteger('cargo_firm')->nullable();
            $table->tinyInteger('payment_method')->nullable();
            $table->decimal('earning', 8, 2);
            $table->decimal('dealer_commission', 8, 2);
            $table->decimal('company_commission', 8, 2);
            $table->decimal('total', 8, 2);
            $table->tinyInteger('status')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->dateTime('cancel_date')->nullable();
            $table->string('cargo_barcode', 128)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
