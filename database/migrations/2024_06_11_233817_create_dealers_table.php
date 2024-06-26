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
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('dealer_group_id')->constrained('dealer_groups')->onDelete('cascade');
            $table->string('name', 128);
            $table->date('payment_date')->nullable();
            $table->string('tax_office')->nullable();
            $table->string('tax_number', 11)->nullable();
            $table->string('iban', 64)->nullable();
            $table->string('identity_number', 11)->nullable();
            $table->mediumText('notes')->nullable();
            $table->text('address')->nullable();
            $table->string('email', 128)->nullable();
            $table->string('phone', 16)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->decimal('balance', 8, 2)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealers');
    }
};
