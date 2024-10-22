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
        Schema::create('discount', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('description');
            $table->double('percentage');
            $table->date('startedDate');
            $table->date('endedDate');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_discount', function (Blueprint $table) {
            $table->string('product_id');
            $table->string('discount_id');
            $table->primary(['product_id', 'discount_id']);
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discount')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_discount');
        Schema::dropIfExists('discount');
    }
};
