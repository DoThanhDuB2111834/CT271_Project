<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Customer
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');
});

//end customer

//admin 
Route::get('/admin/login', [LoginController::class, 'create'])->name('admin_login_create');
Route::post('/admin/login', [LoginController::class, 'store'])->name('admin_login_store');