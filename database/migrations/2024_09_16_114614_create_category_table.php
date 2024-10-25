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
        Schema::create('category', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('urlImageSlider')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('has_children_category', function (Blueprint $table) {
            $table->id();
            $table->string('parent_id');
            $table->string('child_id');

            $table->foreign('parent_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('category')->onDelete('cascade');
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('category_id');

            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('has_children_category');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('category');
    }
};
