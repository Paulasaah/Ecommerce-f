<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas de productos
Route::prefix('products')->controller(ProductController::class)->group(function() {
    Route::get('/', 'index')->name('products.index');
    Route::get('/{id}/{category?}', 'show')->name('products.show');
});

// Ruta home (elimina la duplicada)
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

// Auth routes
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas de admin 
Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store',[ CategoryController::class,'store'])->name('admin.categories.store');

    Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('admin.products.store');
});