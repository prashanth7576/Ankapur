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
            // $table->string('orderid');
            // $table->string('customerid');
            // // $table->string('productid');
            // $table->string('customername');
            // $table->unsignedBigInteger('mobile')->length(10);
            // $table->integer('quantity');
            // $table->integer('price');
            // $table->time('ordertime')->nullable();
            // $table->date('orderdate')->nullable();

            $table->string('customerid');
            $table->string('orderid');
            $table->string('productid');
            $table->string('customername');
            $table->string('mobile');
            $table->string('productname');
            $table->integer('quantity');
            $table->unsignedBigInteger('productprice')->length(50);
            $table->unsignedBigInteger('totalprice')->length(50);
            $table->time('ordertime')->nullable();
            $table->date('orderdate')->nullable();
            $table->string('status')->default('preparing');
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
