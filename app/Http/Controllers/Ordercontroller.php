<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
// use App\Models\User;  // Comentado temporalmente

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        // $orders = Order::with('user')->latest()->paginate(10);  // Versión original comentada
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        // $users = User::all();  // Comentado temporalmente
        return view('order.create'/*, compact('users')*/);  // Parámetro comentado
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'user_id' => 'required|exists:users,id',  // Comentado temporalmente
            'total' => 'required|numeric|min:0',
            'status' => 'nullable|in:pending,completed,cancelled',
        ]);

        Order::create($validated);

        return redirect()->route('order.index')->with('success', 'Orden creada correctamente');
    }

    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        // $users = User::all();  // Comentado temporalmente
        return view('order.edit', compact('order'/*, 'users'*/));  // Parámetro comentado
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            // 'user_id' => 'required|exists:users,id',  // Comentado temporalmente
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order->update($validated);

        return redirect()->route('order.index')->with('success', 'Orden actualizada correctamente');
    }

    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return redirect()->route('order.index')->with('success', 'Orden eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo eliminar la orden');
        }
    }
}
