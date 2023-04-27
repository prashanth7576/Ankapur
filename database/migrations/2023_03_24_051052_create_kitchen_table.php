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
        Schema::create('kitchen', function (Blueprint $table) {
            $table->id();
            $table->string('customerid');
            $table->string('orderid');
            $table->string('productid');
            $table->string('customername');
            $table->string('mobile');
            $table->string('productname');
            $table->integer('quantity');
            $table->unsignedBigInteger('productprice')->length(10);
            $table->unsignedBigInteger('totalprice')->length(10);
            $table->time('ordertime')->nullable();
            $table->date('orderdate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitchen');
    }
};
