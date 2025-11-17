<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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
    
    // Categories
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories', [CategoryController::class, 'table'])->name('admin.categories.table');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Brands
    Route::get('/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
    Route::post('/brands/store', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::get('/brands', [BrandController::class, 'table'])->name('admin.brands.table');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

    // Products
    Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('products', [ProductController::class, 'table'])->name('admin.products.table');
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});