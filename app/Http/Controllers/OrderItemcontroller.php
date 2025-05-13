<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::with(['order', 'product'])->get();
        return view('order_items.index', compact('orderItems'));
    }

    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_items.create', compact('orders', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0'
        ]);

        $orderItem = new OrderItem();
        $orderItem->order_id = $request->order_id;
        $orderItem->product_id = $request->product_id;
        $orderItem->quantity = $request->quantity;
        $orderItem->unit_price = $request->unit_price;
        $orderItem->save();

        // Actualizar el total del pedido
        $order = Order::find($request->order_id);
        $order->total = $order->orderItems->sum(function($item) {
            return $item->quantity * $item->unit_price;
        });
        $order->save();

        return redirect()->route('order_items.index')->with('success', 'Ítem de pedido creado exitosamente');
    }

    public function show($id)
    {
        $orderItem = OrderItem::with(['order', 'product'])->findOrFail($id);
        return view('order_items.show', compact('orderItem'));
    }

    public function edit(OrderItem $orderItem)
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_items.edit', compact('orderItem', 'orders', 'products'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0'
        ]);

        $orderItem->order_id = $request->order_id;
        $orderItem->product_id = $request->product_id;
        $orderItem->quantity = $request->quantity;
        $orderItem->unit_price = $request->unit_price;
        $orderItem->save();

        // Actualizar el total del pedido
        $order = Order::find($request->order_id);
        $order->total = $order->orderItems->sum(function($item) {
            return $item->quantity * $item->unit_price;
        });
        $order->save();

        return redirect()->route('order_items.index')->with('success', 'Ítem de pedido actualizado exitosamente');
    }

    public function destroy(OrderItem $orderItem)
    {
        $order_id = $orderItem->order_id; // Guardamos el order_id antes de eliminar
        
        $orderItem->delete();

        // Actualizar el total del pedido
        $order = Order::find($order_id);
        if($order) {
            $order->total = $order->orderItems->sum(function($item) {
                return $item->quantity * $item->unit_price;
            });
            $order->save();
        }

        return redirect()->route('order_items.index')->with('success', 'Ítem de pedido eliminado exitosamente');
    }
}
