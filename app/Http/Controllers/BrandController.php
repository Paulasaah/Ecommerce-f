<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.brands.table')->with('success', 'Marca creada exitosamente');
    }

    public function table()
    {
        $brands = Brand::withCount('products')->orderBy('id', 'desc')->paginate(10);
        return view('admin.brands.table', [
            'brands' => $brands
        ]);
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        
        // Verificar si hay productos asociados a esta marca
        if ($brand->products()->count() > 0) {
            return redirect()->route('admin.brands.table')
                ->with('error', 'No se puede eliminar la marca porque tiene productos asociados. Elimina o reasigna los productos primero.');
        }
        
        $brand->delete();
        
        return redirect()->route('admin.brands.table')->with('success', 'Marca eliminada exitosamente');
    }
}
