<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard.index');

// Route::resource('product', ProductController::class);
Route::prefix('product')->controller(CategoryController::class)->name('product.')->group(function () {
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