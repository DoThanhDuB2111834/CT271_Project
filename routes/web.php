<?php

use App\Http\Controllers\client\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index'])->name('index');

Route::get('/Shop/{categoryName}', [HomePageController::class, 'showCategoryDetailPage']);

