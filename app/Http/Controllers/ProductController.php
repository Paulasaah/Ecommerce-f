<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(Request $request){
        return view('products.index');
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
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('products.table',[
            'products' => $products
            ]);
    }
}
