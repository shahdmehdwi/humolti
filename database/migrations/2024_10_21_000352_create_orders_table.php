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
            $table->string('pickUpLocation');
            $table->string('deliveryLocation');
            $table->double('price');
                   $table->foreignId('customer_id')->references('id')->on('customers')->onDelete('cascade');
                   $table->foreignId('driver_id')->references('id')->on('drivers')->onDelete('cascade');
                   $table->foreignId('payment_id')->references('id')->on('payments')->onDelete('cascade');
                   $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
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
