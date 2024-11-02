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
        Schema::create('order', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('username');
            $table->string('address');
            $table->string('description')->nullable();
            $table->string('phone_number');
            $table->double('total_price')->nullable();
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('coupon_order', function (Blueprint $table) {
            $table->string('coupon_id');
            $table->string('order_id');
            $table->primary(['coupon_id', 'order_id']);
            $table->foreign('coupon_id')->references('id')->on('coupon')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_order');
        Schema::dropIfExists('order');
    }
};
