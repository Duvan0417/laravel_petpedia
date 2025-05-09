<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Trainer;
use App\Models\Shelter;
use App\Models\User;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        $shelters = Shelter::all();
        $veterinaries = Veterinarian::all();
        $users = User::all();

        return view('roles.create', compact('trainers', 'shelters', 'veterinaries', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'trainer_id' => 'required|exists:trainers,id',
            'shelter_id' => 'required|exists:shelters,id',
            'veterinary_id' => 'required|exists:veterinaries,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $trainers = Trainer::all();
        $shelters = Shelter::all();
        $veterinaries = Veterinarian::all();
        $users = User::all();

        return view('roles.edit', compact('role', 'trainers', 'shelters', 'veterinaries', 'users'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'trainer_id' => 'required|exists:trainers,id',
            'shelter_id' => 'required|exists:shelters,id',
            'veterinary_id' => 'required|exists:veterinaries,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted.');
    }
}


