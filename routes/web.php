<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes - LUXE Colombia
|--------------------------------------------------------------------------
*/

// ===== HOME / WELCOME =====
Route::get('/', [HomeController::class, 'welcome'])->name('index');

// ===== AUTHENTICATION ROUTES =====
Auth::routes(); // Si usas Breeze/Fortify/Inertia, reemplázalo por sus rutas

// ===== AUTHENTICATED USER HOME =====
Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

// ===== PRODUCTS ROUTES =====
Route::prefix('products')
    ->as('products.')
    ->controller(ProductController::class)
    ->group(function () {
        // Public
        Route::get('/', 'index')->name('index');
        Route::get('/search', 'search')->name('search');
        Route::get('/{id}', 'show')->whereNumber('id')->name('show');

        // Protegidas (ej. admin): ajusta middleware a lo que uses
        Route::middleware(['auth'])->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');             // POST /products
            Route::get('/{id}/edit', 'edit')->whereNumber('id')->name('edit');
            Route::put('/{id}', 'update')->whereNumber('id')->name('update');
            Route::delete('/{id}', 'destroy')->whereNumber('id')->name('destroy');
        });
    });

// ===== CATEGORIES ROUTES =====
Route::prefix('categories')
    ->as('categories.')
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->whereNumber('id')->name('show');
        // Si prefieres slug: Route::get('/{slug}', 'show')->name('show');
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
