<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReceiptController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\UserRoleController;
use App\Models\discount;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('api/findOrderWithState/{state}', [OrderController::class, 'findOrderWithState']);

Route::get('api/findUserWithRole/{role}', [UserRoleController::class, 'findUserWithRole'])->middleware('permission:show-role');

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

Route::prefix('role')->controller(RoleController::class)->name('role.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware('permission:show-role');
    Route::post('/', 'store')->name('store')->middleware('permission:create-role');
    Route::get('/create', 'create')->name('create')->middleware('permission:create-role');
    Route::get('/{role}', 'show')->name('show')->middleware('permission:show-role');
    Route::put('/{role}', 'update')->name('update')->middleware('permission:update-role');
    Route::delete('/{role}', 'destroy')->name('destroy')->middleware('permission:delete-role');
    Route::get('/{role}/edit', 'edit')->name('edit')->middleware('permission:update-role');
});
// Route::resource('role', RoleController::class)->middleware('role:superadmin');

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

Route::prefix('discount')->controller(DiscountController::class)->name('discount.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware('permission:show-discount');
    Route::post('/', 'store')->name('store')->middleware('permission:create-discount');
    Route::get('/create', 'create')->name('create')->middleware('permission:create-discount');
    Route::get('/{discount}', 'show')->name('show')->middleware('permission:show-discount');
    Route::put('/{discount}', 'update')->name('update')->middleware('permission:update-discount');
    Route::delete('/{discount}', 'destroy')->name('destroy')->middleware('permission:delete-discount');
    Route::get('/{discount}/edit', 'edit')->name('edit')->middleware('permission:update-discount');
});

Route::prefix('coupon')->controller(CouponController::class)->name('coupon.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware('permission:show-coupon');
    Route::post('/', 'store')->name('store')->middleware('permission:create-coupon');
    Route::get('/create', 'create')->name('create')->middleware('permission:create-coupon');
    Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-coupon');
    Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-coupon');
    Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-coupon');
    Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-coupon');
});

Route::prefix('order')->controller(OrderController::class)->name('order.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware('permission:show-order');
    Route::get('/{order}', 'show')->name('show')->middleware('permission:show-order');
    Route::put('/{order}', 'update')->name('update')->middleware('permission:update-order');
});

Route::prefix('UserRole')->controller(UserRoleController::class)->name('UserRole.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware('permission:show-user');
    Route::post('/', 'store')->name('store')->middleware('permission:create-user');
    Route::get('/create', 'create')->name('create')->middleware('permission:create-user');
    Route::put('/{user}', 'update')->name('update')->middleware('permission:update-user');
    Route::get('/{user}/edit', 'edit')->name('edit')->middleware('permission:update-user');
});

