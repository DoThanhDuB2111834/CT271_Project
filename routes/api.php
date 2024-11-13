<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\CouponController;
use Illuminate\Support\Facades\Route;

Route::get('api/product/{productName}', [ProductController::class, 'find'])->name('findProduct');

Route::get('api/getQuantityProduct/{id}', [ProductController::class, 'getProductQuantity'])->name('getQuantityProduct');

Route::get('api/getCoupon/{id}', [CouponController::class, 'getCoupon']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('api/sync-cart', [CartController::class, 'sync']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('api/getCartItems', [CartController::class, 'getCartItems']);
    Route::post('api/addOrUpdateCart', [CartController::class, 'addOrUpdate']);
    Route::put('api/syncItem', [CartController::class, 'syncItem']);
    Route::delete('api/removeCart/{productId}', [CartController::class, 'remmoveCart']);
});