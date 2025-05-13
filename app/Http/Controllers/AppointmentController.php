<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Veterinarian;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['user', 'veterinarian'])->paginate(10);
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $users = User::all();
        $veterinarians = Veterinarian::all();
        return view('appointments.create', compact('users', 'veterinarians'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'state' => 'required|string|max:255',
            'reason' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'veterinarian_id' => 'nullable|exists:veterinarians,id'
        ]);

        Appointment::create($validated);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment created successfully');
    }

    public function show(Appointment $appointment)
    {
        $appointment->load(['user', 'veterinarian']);
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $users = User::all();
        $veterinarians = Veterinarian::all();
        return view('appointments.edit', compact('appointment', 'users', 'veterinarians'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'state' => 'required|string|max:255',
            'reason' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'veterinarian_id' => 'nullable|exists:veterinarians,id'
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated successfully');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted successfully');
    }
}