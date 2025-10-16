<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('products') ->controller(ProductController::class)->group(function() {
    Route::get('/','index' );

    Route::get('/create', 'create' );

    Route::get('/{id}/{category?}', 'show');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'welcome']);
