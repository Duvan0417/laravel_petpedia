<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Mostrar lista de productos con sus categorías
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('products.index', compact('products'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Guardar producto y asignar categorías
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image',
            'main_category' => 'required|exists:categories,id' // Categoría principal
        ]);

        // Crear producto
        $product = Product::create($validated);

        // Asignar categorías (con is_principal)
        $syncData = [];
        foreach ($request->input('categories', []) as $categoryId) {
            $syncData[$categoryId] = ['is_principal' => ($categoryId == $request->main_category)];
        }
        $product->categories()->sync($syncData);

        return redirect()->route('products.index')->with('success', 'Producto creado!');

        
    }
}
