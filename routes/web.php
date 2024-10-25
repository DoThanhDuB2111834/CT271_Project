<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
})->middleware('auth');

Route::get('/Shop', function () {
    return view('client.HomePage');
});