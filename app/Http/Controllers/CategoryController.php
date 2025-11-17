<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.table')->with('success', 'Categoría creada exitosamente');
    }

    public function table()
    {
        $categories = Category::withCount('products')->orderBy('id', 'desc')->paginate(10);
        return view('admin.categories.table', [
            'categories' => $categories
        ]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Verificar si hay productos asociados a esta categoría
        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories.table')
                ->with('error', 'No se puede eliminar la categoría porque tiene productos asociados. Elimina o reasigna los productos primero.');
        }
        
        $category->delete();
        
        return redirect()->route('admin.categories.table')->with('success', 'Categoría eliminada exitosamente');
    }
}