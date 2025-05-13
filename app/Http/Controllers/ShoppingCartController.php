<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $shoppingCarts = ShoppingCart::with(['product', 'order', 'user'])->get();
        return view('shoppingcart.index', compact('shoppingCarts'));
    }

    public function create()
    {
        $products = Product::all();
        $orders = Order::all();
        $users = User::all();
        return view('shoppingcart.create', compact('products', 'orders', 'users'));
    }

    public function store(Request $request)
    {
        $shoppingCart = new ShoppingCart();
        $shoppingCart->creation_date = $request->creation_date ?? now();
        $shoppingCart->quantity = $request->quantity;
        $shoppingCart->user_id = $request->user_id;
        $shoppingCart->product_id = $request->product_id;
        $shoppingCart->order_id = $request->order_id;
        $shoppingCart->save();

        return redirect()->route('shoppingcart.index');
    }

    public function show($id)
    {
        $shoppingCart = ShoppingCart::with(['product', 'order', 'user'])->findOrFail($id);
        return view('shoppingcart.show', compact('shoppingCart'));
    }

    public function destroy(ShoppingCart $shoppingcart)
    {
        $shoppingcart->delete();
        return redirect()->route('shoppingcart.index');
    }

    public function edit($id)
{
    // Asegúrate de obtener el carrito y pasarlo a la vista
    $shoppingCart = ShoppingCart::with(['product', 'user', 'order'])->findOrFail($id);
    $products = Product::all();
    $orders = Order::all();
    $users = User::all();
    
    return view('shoppingcart.edit', compact('shoppingCart', 'products', 'orders', 'users'));
}

    public function update(Request $request, ShoppingCart $shoppingcart)
    {
        $shoppingcart->creation_date = $request->creation_date;
        $shoppingcart->quantity = $request->quantity;
        $shoppingcart->user_id = $request->user_id;
        $shoppingcart->product_id = $request->product_id;
        $shoppingcart->order_id = $request->order_id;
        $shoppingcart->save();

        return redirect()->route('shoppingcart.index');
    }
}