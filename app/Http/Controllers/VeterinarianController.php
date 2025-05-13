<?php

namespace App\Http\Controllers;

use App\Models\Veterinarian;
use Illuminate\Http\Request;

class VeterinarianController extends Controller
{
    public function index()
    {
        $veterinarians = Veterinarian::all();
        return view('veterinarians.index', compact('veterinarians'));
    }

    public function create()
    {
        return view('veterinarians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'hours' => 'required',
            'services_offered' => 'required',
        ]);

        Veterinarian::create($request->all());
        return redirect()->route('veterinarians.index');
    }

    public function show(Veterinarian $veterinarian)
    {
        return view('veterinarians.show', compact('veterinarian'));
    }

    public function edit(Veterinarian $veterinarian)
    {
        return view('veterinarians.edit', compact('veterinarian'));
    }

    public function update(Request $request, Veterinarian $veterinarian)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'hours' => 'required',
            'services_offered' => 'required',
        ]);

        $veterinarian->update($request->all());
        return redirect()->route('veterinarians.index');
    }

    public function destroy(Veterinarian $veterinarian)
    {
        $veterinarian->delete();
        return redirect()->route('veterinarians.index');
    }
}
