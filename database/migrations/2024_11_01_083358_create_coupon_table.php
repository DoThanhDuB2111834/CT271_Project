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
        Schema::create('coupon', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->double('value');
            $table->date('startedDate');
            $table->date('endedDate');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('coupon_cart', function (Blueprint $table) {
            $table->string('coupon_id');
            $table->unsignedBigInteger('cart_id');
            $table->primary(['coupon_id', 'cart_id']);
            $table->foreign('coupon_id')->references('id')->on('coupon')->onDelete('cascade');
            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_cart');
        Schema::dropIfExists('coupon');
    }
};
