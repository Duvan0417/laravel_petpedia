<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\User;
use App\Models\Shelter;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::with(['user', 'appointment', 'shelter'])->get();
        return view('requests.index', compact('requests'));
    }
public function create()
{
    $users = User::all();
    $shelters = Shelter::all();
    $services = Service::all();
    $appointments = Appointment::all();
    
    return view('requests.create', compact('users', 'shelters', 'services', 'appointments'));
}

    public function store(HttpRequest $request)
    
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'shelter_id' => 'required|exists:shelters,id',
        'services_id' => 'required|exists:services,id',
        'date' => 'required|date',
        'priority' => 'required|integer',
        'solicitation_status' => 'required|string',
        'appointment_id' => 'nullable|exists:appointments,id',
    ]);

    // ✅ Conversión segura del campo "date"
    if (isset($validated['date'])) {
        $validated['date'] = date('Y-m-d H:i:s', strtotime($validated['date']));
    }

    \App\Models\Request::create($validated);

    return redirect()->route('requests.index')->with('success', 'Solicitud registrada correctamente.');
}
    public function edit(Request $requestModel)
    {
        $users = User::all();
        $shelters = Shelter::all();
        $appointments = Appointment::all();
        return view('requests.edit', compact('requestModel', 'users', 'shelters', 'appointments'));
    }

    public function update(HttpRequest $request, Request $requestModel)
    {
    // Validación de los datos
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'shelter_id' => 'required|exists:shelters,id',
        'services_id' => 'required|exists:services,id',
        'date' => 'required|date',
        'priority' => 'required|integer',
        'solicitation_status' => 'required|string',
        'appointment_id' => 'nullable|exists:appointments,id'
    ]);

    // Actualización del modelo
    $requestModel->update($validatedData);

    return redirect()->route('requests.index')
        ->with('success', 'Solicitud actualizada exitosamente.');
}

    public function destroy(Request $requestModel)
    {
        $requestModel->delete();
        return redirect()->route('requests.index');
    }
}
