<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage (welcome page)
     */
    public function welcome()
    {
        // Get featured products (with badges or latest)
        $products = Product::with('category')
            ->inStock()
            ->latest()
            ->limit(8)
            ->get();

        // Get all categories
        $categories = Category::withProducts()
            ->limit(8)
            ->get();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the application dashboard (for authenticated users)
     */
    public function index()
    {
        $user = auth()->user();

        // Get recent products
        $recentProducts = Product::with('category')
            ->latest()
            ->limit(4)
            ->get();

        return view('home', compact('user', 'recentProducts'));
    }
}

// ===== VISTA home.blade.php SUGERIDA =====
//
// @extends('layouts.app')
//
// @section('content')
// <div class="container" style="padding: 8rem 4rem 4rem;">
//     <h1>Welcome, {{ $user->name }}!</h1>
//
//     <div class="user-dashboard">
//         <h2>Your Dashboard</h2>
//         <!-- User orders, favorites, etc -->
//     </div>
//
//     <h2>Recent Products</h2>
//     <div class="products-grid">
//         @foreach($recentProducts as $product)
//             <!-- Product cards -->
//         @endforeach
//     </div>
// </div>
// @endsection
