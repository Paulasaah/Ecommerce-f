<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('products', [ProductController::class, 'index'] );

Route::get('products/create', [ProductController::class,'create'] );

Route::get('products/{id}/{category?}', [ProductController::class, 'show']);
