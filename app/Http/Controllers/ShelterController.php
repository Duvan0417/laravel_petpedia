<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use Illuminate\Http\Request;

class ShelterController extends Controller
{
    public function index()
    {
        $shelters = Shelter::all();
        return view('shelters.index', compact('shelters'));
    }

    public function create()
    {
        return view('shelters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|integer',
            'responsible' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        Shelter::create($request->all());
        return redirect()->route('shelters.index')->with('success', 'Refugio creado correctamente.');
    }

    public function show(Shelter $shelter)
    {
        return view('shelters.show', compact('shelter'));
    }

    public function edit(Shelter $shelter)
    {
        return view('shelters.edit', compact('shelter'));
    }

    public function update(Request $request, Shelter $shelter)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|integer',
            'responsible' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $shelter->update($request->all());
        return redirect()->route('shelters.index')->with('success', 'Refugio actualizado correctamente.');
    }

    public function destroy(Shelter $shelter)
    {
        $shelter->delete();
        return redirect()->route('shelters.index')->with('success', 'Refugio eliminado correctamente.');
    }
}
