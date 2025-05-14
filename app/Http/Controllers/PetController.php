<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Shelter;
use App\Models\Trainer;

use App\Models\User;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with(['shelter', 'trainer'])->paginate(10);
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        $shelters = Shelter::all();
        $trainers = Trainer::all();
        return view('pets.create', compact('shelters', 'trainers'));
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'species' => 'required|string',
        'breed' => 'required|string',
        'size' => 'required|numeric',
        'sex' => 'required|string',
        'gmail' => 'required|email',
        'description' => 'nullable|string',
        'biography' => 'nullable|string',
        'shelter_id' => 'nullable|exists:shelters,id',
    ]);

    Pet::create([
        'name' => $request->name,
        'age' => $request->age,
        'species' => $request->species,
        'breed' => $request->breed,
        'size' => $request->size,
        'sex' => $request->sex,
        'gmail' => $request->gmail,
        'description' => $request->description,
        'biography' => $request->biography,
        'trainer_id' => auth()->user()->trainer_id ?? null,
        'appointment_id' => null,
        'shelter_id' => $request->shelter_id,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('pets.index')->with('success', 'Mascota registrada exitosamente.');
}

    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        $shelters = Shelter::all();
        $trainers = Trainer::all();
        return view('pets.edit', compact('pet', 'shelters', 'trainers'));
    }

    public function update(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'size' => 'required|numeric|min:0',
            'sex' => 'required|in:Macho,Hembra',
            'gmail' => 'required|email',
            'description' => 'nullable|string',
            'biography' => 'nullable|string',
            'shelter_id' => 'nullable|exists:shelters,id',
            'trainer_id' => 'nullable|exists:trainers,id',
        ]);

        $pet->update($validated);

        return redirect()->route('pets.index')->with('success', 'Mascota actualizada exitosamente.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Mascota eliminada exitosamente.');
    }
}