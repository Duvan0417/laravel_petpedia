<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with('product')->get();
        return view('inventory.index', compact('inventories'));
    }

    public function create()
    {
        $products = Product::all();
        return view('inventory.create', compact('products'));
    }

    public function store(Request $request)
    {
        $inventory = new Inventory();
        $inventory->product_id = $request->product_id;
        $inventory->quantity_available = $request->quantity_available;
        $inventory->save();

        return redirect()->route('inventory.index');
    }

    public function show($id)
    {
        $inventory = Inventory::with('product')->findOrFail($id);
        return view('inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        $products = Product::all();
        return view('inventory.edit', compact('inventory', 'products'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $inventory->quantity_available = $request->quantity_available;
        $inventory->product_id = $request->product_id;
        $inventory->save();

        return redirect()->route('inventory.index');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index');
    }
}
