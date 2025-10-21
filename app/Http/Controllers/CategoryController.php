<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories
     */
    public function index()
    {
        $category = Category::withProducts()
            ->withCount('products')
            ->get();

        // Get featured products from all categories
        $featuredProducts = Product::with('category')
            ->featured()
            ->inStock()
            ->latest()
            ->limit(8)
            ->get();

        return view('categories.index', compact('category', 'featuredProducts'));
    }

    /**
     * Display the specified category with products
     */
    public function show($id, Request $request)
    {
        $category = Category::findOrFail($id);

        // Get products for this category with optional filters
        $query = Product::where('category_id', $id)
            ->with('category');

        // Apply filters if present
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'newest':
                    $query->latest();
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        // Price range filter
        if ($request->has('price_range')) {
            switch ($request->price_range) {
                case 'under_1000':
                    $query->where('price', '<', 1000);
                    break;
                case '1000_2000':
                    $query->whereBetween('price', [1000, 2000]);
                    break;
                case 'over_2000':
                    $query->where('price', '>', 2000);
                    break;
            }
        }

        // Stock filter
        if ($request->has('in_stock') && $request->in_stock == '1') {
            $query->where('stock', '>', 0);
        }

        // Pagination
        $products = $query->paginate(12)->withQueryString();

        // Get all categories for navigation
        $category = Category::all();

        return view('categories.show', compact('category', 'products', 'category'));
    }
}

// ===== RUTAS SUGERIDAS EN web.php =====
//
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
//
// ===== EJEMPLO DE FILTROS EN URL =====
//
// /categories/1?sort=price_asc
// /categories/1?sort=price_desc
// /categories/1?min_price=1000&max_price=5000
// /categories/1?in_stock=1
// /categories/1?sort=newest&in_stock=1
