<?php

use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('api/product/{productName}', [ProductController::class, 'find'])->name('findProduct');