<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Product;
use App\Models\User;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $shoppingCarts = ShoppingCart::with(['product', 'user'])->get();
        return view('shoppingcart.index', compact('shoppingCarts'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('shoppingcart.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $existingCartItem = ShoppingCart::where('user_id', $validated['user_id'])
                                      ->where('product_id', $validated['product_id'])
                                      ->first();

        if ($existingCartItem) {
            $existingCartItem->increment('quantity', $validated['quantity']);
            return redirect()->route('shoppingcart.index')->with('success', 'Cantidad actualizada');
        }

        ShoppingCart::create($validated);
        return redirect()->route('shoppingcart.index')->with('success', 'Producto añadido');
    }

    public function show(ShoppingCart $shoppingcart)
    {
        $shoppingcart->load(['product', 'user']);
        return view('shoppingcart.show', compact('shoppingcart'));
    }

    public function edit(ShoppingCart $shoppingcart)
    {
        $products = Product::all();
        $users = User::all();
        return view('shoppingcart.edit', compact('shoppingcart', 'products', 'users'));
    }

    public function update(Request $request, ShoppingCart $shoppingcart)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $shoppingcart->update($validated);
        return redirect()->route('shoppingcart.index')->with('success', 'Item actualizado');
    }

    public function destroy(ShoppingCart $shoppingcart)
    {
        $shoppingcart->delete();
        return redirect()->route('shoppingcart.index')->with('success', 'Item eliminado');
    }

    public function getUserCart($userId)
    {
        $userCart = ShoppingCart::with('product')->where('user_id', $userId)->get();
        return view('shoppingcart.user_cart', compact('userCart'));
    }

    public function clearUserCart($userId)
    {
        ShoppingCart::where('user_id', $userId)->delete();
        return back()->with('success', 'Carrito vaciado');
    }
}