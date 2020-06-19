<?php

use Illuminate\Support\Facades\Route;

/*a*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'TEST - ' . date('Y-m-d H:i:s');
});


Route::get('/error', function () {
    return view('error');
});
