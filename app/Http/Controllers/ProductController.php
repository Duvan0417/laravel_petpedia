<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'inventory'])->paginate(10); // 10 items por página
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'initial_quantity' => 'required|integer|min:0'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $request->hasFile('image') 
                ? $request->file('image')->store('products', 'public')
                : null
        ]);

        // El inventory se crea automáticamente por el evento en el modelo
        return redirect()->route('products.index')
            ->with('success', 'Producto creado correctamente');
    }

    public function show($id)
    {
        $product = Product::with(['category', 'inventory'])->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantity_available' => 'required|integer|min:0'
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $request->hasFile('image')
                ? $request->file('image')->store('products', 'public')
                : $product->image
        ]);

        $product->inventory()->updateOrCreate(
            ['product_id' => $product->id],
            ['quantity_available' => $request->quantity_available]
        );

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}