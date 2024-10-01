<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReceiptController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard.index');

// Route::resource('product', ProductController::class);
Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware('permission:show-product');
    Route::post('/', 'store')->name('store')->middleware('permission:create-product');
    Route::get('/create', 'create')->name('create')->middleware('permission:create-product');
    Route::get('/{product}', 'show')->name('show')->middleware('permission:show-product');
    Route::put('/{product}', 'update')->name('update')->middleware('permission:update-product');
    Route::delete('/{product}', 'destroy')->name('destroy')->middleware('permission:delete-product');
    Route::get('/{product}/edit', 'edit')->name('edit')->middleware('permission:update-product');
});
// Route::resource('category', CategoryController::class);
Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware('permission:show-category');
    Route::post('/', 'store')->name('store')->middleware('permission:create-category');
    Route::get('/create', 'create')->name('create')->middleware('permission:create-category');
    Route::get('/{category}', 'show')->name('show')->middleware('permission:show-category');
    Route::put('/{category}', 'update')->name('update')->middleware('permission:update-category');
    Route::delete('/{category}', 'destroy')->name('destroy')->middleware('permission:delete-category');
    Route::get('/{category}/edit', 'edit')->name('edit')->middleware('permission:update-category');
});
Route::resource('role', RoleController::class)->middleware('role:superadmin');

Route::prefix('supplier')->controller(SupplierController::class)->name('supplier.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware('permission:show-supplier');
    Route::post('/', 'store')->name('store')->middleware('permission:create-supplier');
    Route::get('/create', 'create')->name('create')->middleware('permission:create-supplier');
    Route::get('/{supplier}', 'show')->name('show')->middleware('permission:show-supplier');
    Route::put('/{supplier}', 'update')->name('update')->middleware('permission:update-supplier');
    Route::delete('/{supplier}', 'destroy')->name('destroy')->middleware('permission:delete-supplier');
    Route::get('/{supplier}/edit', 'edit')->name('edit')->middleware('permission:update-supplier');
});

Route::prefix('goods_receipt')->controller(ReceiptController::class)->name('goods_receipt.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware('permission:show-goods_receipt');
    Route::post('/', 'store')->name('store')->middleware('permission:create-goods_receipt');
    Route::get('/create', 'create')->name('create')->middleware('permission:create-goods_receipt');
    Route::get('/{goods_receipt}', 'show')->name('show')->middleware('permission:show-goods_receipt');
    Route::put('/{goods_receipt}', 'update')->name('update')->middleware('permission:update-goods_receipt');
    Route::delete('/{goods_receipt}', 'destroy')->name('destroy')->middleware('permission:delete-goods_receipt');
    Route::get('/{goods_receipt}/edit', 'edit')->name('edit')->middleware('permission:update-goods_receipt');
});