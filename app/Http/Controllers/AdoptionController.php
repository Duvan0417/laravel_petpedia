<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\User;
use App\Models\Pet;
use App\Models\Request as AdoptionRequest; // Cambiar nombre para evitar conflictos
use App\Models\Shelter;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function index()
    {
        $adoptions = Adoption::with(['user', 'pet', 'request', 'shelter'])->get();
        return view('adoptions.index', compact('adoptions'));
    }

    public function create()
    {
        $users = User::all();
        $pets = Pet::all();
        $requests = AdoptionRequest::all();
        $shelters = Shelter::all();

        return view('adoptions.create', compact('users', 'pets', 'requests', 'shelters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pet_id' => 'required|exists:pets,id',
            'application_date' => 'required|date',
            'status' => 'required|string',
            'comments' => 'nullable|string',
            'request_id' => 'required|exists:requests,id',
            'shelter_id' => 'required|exists:shelters,id',
        ]);

        Adoption::create($request->all());
        return redirect()->route('adoptions.index')->with('success', 'Adopción creada con éxito.');
    }

    public function edit(Adoption $adoption)
    {
        $users = User::all();
        $pets = Pet::all();
        $requests = AdoptionRequest::all();
        $shelters = Shelter::all();

        return view('adoptions.edit', compact('adoption', 'users', 'pets', 'requests', 'shelters'));
    }

    public function update(Request $request, Adoption $adoption)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pet_id' => 'required|exists:pets,id',
            'application_date' => 'required|date',
            'status' => 'required|string',
            'comments' => 'nullable|string',
            'request_id' => 'required|exists:requests,id',
            'shelter_id' => 'required|exists:shelters,id',
        ]);

        $adoption->update($request->all());
        return redirect()->route('adoptions.index')->with('success', 'Adopción actualizada con éxito.');
    }
}
