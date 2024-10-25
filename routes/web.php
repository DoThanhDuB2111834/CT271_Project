<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.HomePage');
});

Route::get('/Shop', function () {
    return view('client.HomePage');
});