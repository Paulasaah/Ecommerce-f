<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(Request $request){
        $query = Product::with(['brand', 'category']);

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('brand', function($brandQuery) use ($searchTerm) {
                      $brandQuery->where('name', 'like', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('category', function($categoryQuery) use ($searchTerm) {
                      $categoryQuery->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->orderBy('id', 'desc')->paginate(12)->withQueryString();
        
        return view('products.index', [
            'products' => $products
        ]);
    }
    function create(){

        $brands = Brand::all();
        $categories = Category::all();

        return view('products.create',[
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
    function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brand,id',
            'category_id' => 'required|exists:category,id',
            'price' => 'required|numeric|min:0|max:999999.99',
            'description' => 'required|string',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('admin.products.table');


    }
    function show($id, $category =  null)
    {
        return view('products.show');
    }
    function table(){
        $products = Product::with(['brand', 'category'])->orderBy('id', 'desc')->paginate(10);
        return view('products.table',[
            'products' => $products
            ]);
    }

    function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('admin.products.table')->with('success', 'Producto eliminado exitosamente');
    }
}
