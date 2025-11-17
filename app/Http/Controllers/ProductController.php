<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

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
    function show($id, $category =  null)
    {
        return view('products.show');
    }
}
