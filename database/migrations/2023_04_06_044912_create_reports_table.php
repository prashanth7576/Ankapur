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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('customerid')->nullable();
            $table->date('orderdate')->nullable();
            $table->date('orderstatus')->nullable();
            $table->string('restcode')->default('HN')->nullable();
            $table->string('mobile')->nullable();
            $table->string('customername')->nullable();
            $table->string('customeraddress')->nullable();
            $table->string('transactionstatus')->nullable();
            $table->string('orderid')->nullable();
            $table->integer('itemcount')->nullable();
            $table->unsignedBigInteger('totalprice')->length(10)->nullable();
            $table->unsignedBigInteger('deliverycharge')->length(10)->nullable();
            $table->unsignedBigInteger('CGST')->length(10)->nullable();
            $table->unsignedBigInteger('SGST')->length(10)->nullable();
            $table->unsignedBigInteger('cashsale')->length(10)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
