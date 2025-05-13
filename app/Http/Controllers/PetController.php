<?php

namespace App\Http\Controllers;

use App\Models\Request as PetRequest;
use App\Models\Pet;
use App\Models\Trainer;
use App\Models\Appointment;
use App\Models\Shelter;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with(['trainer', 'appointment', 'shelter', 'user'])->get();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        $appointments = Appointment::all();
        $shelters = Shelter::all();
        $users = User::all();
        return view('pets.create', compact('trainers', 'appointments', 'shelters', 'users'));
    }

    public function store(HttpRequest $request)
    {
        $validatedData = $request->validate([
            'specialty' => 'required|string|max:255',
            'experience' => 'required|integer',
            'qualifications' => 'required|numeric',
            'phone' => 'required|string|max:20', // <-- Mejor usar string para números de teléfono
            'gmail' => 'required|email',
            'biography' => 'nullable|string',
            'trainer_id' => 'nullable|exists:trainers,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'shelter_id' => 'nullable|exists:shelters,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Pet::create($validatedData);

        return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
    }

    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        $trainers = Trainer::all();
        $appointments = Appointment::all();
        $shelters = Shelter::all();
        $users = User::all();
        return view('pets.edit', compact('pet', 'trainers', 'appointments', 'shelters', 'users'));
    }

    public function update(HttpRequest $request, Pet $pet) // <-- Corregido aquí
    {
        $validated = $request->validate([
            'specialty' => 'required|string|max:255',
            'experience' => 'required|integer',
            'qualifications' => 'required|numeric',
            'phone' => 'required|string|max:20', // <-- Mejor como string
            'gmail' => 'required|email',
            'biography' => 'nullable|string',
            'trainer_id' => 'nullable|exists:trainers,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'shelter_id' => 'nullable|exists:shelters,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $pet->update($validated);

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
    }
}
