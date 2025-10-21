<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// ===== HOME / WELCOME =====
Route::get('/', [HomeController::class, 'welcome'])->name('index');

// ===== AUTHENTICATION ROUTES =====
Auth::routes();

// ===== AUTHENTICATED USER HOME =====
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// ===== PRODUCTS ROUTES =====
Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
    // List all products
    Route::get('/', 'index')->name('index');

    // Create new product (admin only - add middleware if needed)
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');

    // Show single product
    Route::get('/{id}', 'show')->whereNumber('id')->name('show');

    // Update product (admin only - add middleware if needed)
    Route::get('/{id}/edit', 'edit')->whereNumber('id')->name('edit');
    Route::put('/{id}', 'update')->whereNumber('id')->name('update');

    // Delete product (admin only - add middleware if needed)
    Route::delete('/{id}', 'destroy')->whereNumber('id')->name('destroy');
});

// ===== CATEGORIES ROUTES =====
Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
    // List all categories
    Route::get('/', 'index')->name('index');

    // Show category with products
    Route::get('/{id}', 'show')->whereNumber('id')->name('show');
});

// ===== CART ROUTES (Future Implementation) =====
// Route::prefix('cart')->name('cart.')->group(function () {
//     Route::get('/', [CartController::class, 'index'])->name('index');
//     Route::post('/add', [CartController::class, 'add'])->name('add');
//     Route::delete('/{id}', [CartController::class, 'remove'])->name('remove');
//     Route::post('/update', [CartController::class, 'update'])->name('update');
// });

// ===== CHECKOUT ROUTES (Future Implementation) =====
// Route::middleware(['auth'])->prefix('checkout')->name('checkout.')->group(function () {
//     Route::get('/', [CheckoutController::class, 'index'])->name('index');
//     Route::post('/process', [CheckoutController::class, 'process'])->name('process');
// });
