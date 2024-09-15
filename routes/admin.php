<?php

use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function (){
    return view('admin.dashboard.index');
});

Route::resource('product', ProductController::class);