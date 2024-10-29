<?php

use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\HomePageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index'])->name('index');

Route::get('/Shop/{categoryName}', [HomePageController::class, 'showCategoryDetailPage'])->name('showCategoryDetail');

Route::get('product/{id}', [HomePageController::class, 'showProductDetailPage'])->name('showProductDetail');

Route::get('cart/', [CartController::class, 'index'])->name('cart.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});