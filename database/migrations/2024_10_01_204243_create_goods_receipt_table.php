<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Goods_receipt', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->double('total_price');
            $table->string('description');
            $table->string('reason');
            $table->string('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('Goods_receipt_detail', function (Blueprint $table) {
            $table->string('Goods_receipt_id');
            $table->string('product_id');
            $table->integer('quantity');
            $table->double('price');
            $table->primary(['Goods_receipt_id', 'product_id']);
            $table->foreign('Goods_receipt_id')->references('id')->on('Goods_receipt')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Goods_receipt_detail');
        Schema::dropIfExists('goods_receipt');
    }
};
