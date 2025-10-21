<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of products
     */
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(12);

        $category = Category::all();

        return view('products.index', compact('products', 'category'));
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return view('products.search', [
                'query' => null,
                'products' => collect([])
            ]);
        }

        $products = Product::with('category')
            ->search($query)
            ->paginate(12)
            ->appends(['q' => $query]);

        return view('products.search', compact('products', 'query'));
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        $category = Category::all();
        return view('products.create', compact('category'));
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:category,id',
            'sku' => 'required|string|unique:products,sku',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB max
            'sizes' => 'required|array|min:1',
            'badge' => 'nullable|string|in:NEW,EXCLUSIVE,LIMITED,SALE'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = ImageHelper::uploadImage($request->file('image'), 'products');
        }

        // Create product
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'sku' => $request->sku,
            'stock' => $request->stock,
            'image_url' => $imagePath,
            'sizes' => json_encode($request->sizes),
            'badge' => $request->badge,
        ]);

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified product
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product
     */
    /**public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();

        return view('products.edit', compact('product', 'category'));
    }

    /**
     * Update the specified product
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:category,id',
            'sku' => 'required|string|unique:products,sku,' . $id,
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'sizes' => 'required|array|min:1',
            'badge' => 'nullable|string|in:NEW,EXCLUSIVE,LIMITED,SALE'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image_url) {
                ImageHelper::deleteImage($product->image_url);
            }
            $product->image_url = ImageHelper::uploadImage($request->file('image'), 'products');
        }

        // Update product
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'sku' => $request->sku,
            'stock' => $request->stock,
            'sizes' => json_encode($request->sizes),
            'badge' => $request->badge,
        ]);

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete image if exists
        if ($product->image_url) {
            ImageHelper::deleteImage($product->image_url);
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
