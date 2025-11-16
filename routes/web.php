<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;


Route::prefix('products') ->controller(ProductController::class)->group(function() {
    Route::get('/','index' );

    Route::get('/create', 'create' );

    Route::get('/{id}/{category?}', 'show');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'welcome']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->controller()->group(function(){
    Route::get('/', [AdminController::class,'index'])->name('admin.index');
    Route::get('/categories',[ CategoryController::class,'create'])->name('admin.categories.create');
});