<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Order; // Asegúrate de importar el modelo Order si lo necesitas

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::with('order')->get(); // Carga la relación "order" para evitar N+1
        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        $orders = Order::all(); // Para dropdown de pedidos (opcional)
        return view('shipments.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shipping_address' => 'required|string',
            'cost' => 'required|numeric',
            'status' => 'required|string',
            'shipping_method' => 'required|string',
            'order_id' => 'nullable|exists:orders,id' // Valida que order_id exista si no es null
        ]);

        Shipment::create($validated);

        return redirect()->route('shipments.index');
    }

    public function show($id)
    {
        $shipment = Shipment::with('order')->findOrFail($id);
        return view('shipments.show', compact('shipment'));
    }

    public function edit($id)
    {
        $shipment = Shipment::findOrFail($id);
        $orders = Order::all(); // Para dropdown de pedidos (opcional)
        return view('shipments.edit', compact('shipment', 'orders'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'shipping_address' => 'required|string',
            'cost' => 'required|numeric',
            'status' => 'required|string',
            'shipping_method' => 'required|string',
            'order_id' => 'nullable|exists:orders,id'
        ]);

        $shipment = Shipment::findOrFail($id);
        $shipment->update($validated);

        return redirect()->route('shipments.index');
    }

    public function destroy($id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->delete();

        return redirect()->route('shipments.index');
    }
}