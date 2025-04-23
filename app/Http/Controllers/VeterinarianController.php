<?php

namespace App\Http\Controllers;

use App\Models\Veterinarian;
use Illuminate\Http\Request;

class VeterinarianController extends Controller
{
    public function create()
    {
        return view('veterinarians.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'hours' => 'required|string|max:255',
            'services_offered' => 'required|string|max:500',
        ]);

        Veterinarian::create($validated);

        return redirect()->route('veterinarians.index')
                         ->with('success', 'Veterinario creado exitosamente.');
    }
    public function index()
{
    $veterinarians = Veterinarian::all();
    return view('veterinarians.index', compact('veterinarians'));
}
}
