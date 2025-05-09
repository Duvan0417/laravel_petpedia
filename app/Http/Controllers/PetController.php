<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
  
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'specialty' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'qualifications' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'biography' => 'nullable|string',
        ]);

        Pet::create($request->all());

        return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
    }

    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'specialty' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'qualifications' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'biography' => 'nullable|string',
        ]);

        $pet->update($request->all());

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
    }
}


