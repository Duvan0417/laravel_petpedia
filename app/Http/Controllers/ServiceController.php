<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Trainer;
use App\Models\Veterinary;
use App\Models\Request;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        // Obtener los entrenadores, veterinarios y solicitudes para pasarlos a la vista
        $trainers = Trainer::all();
        $veterinarians = Veterinary::all();
        $requests = Request::all();

        return view('services.create', compact('trainers', 'veterinarians', 'requests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
            'trainer_id' => 'required|exists:trainers,id',
            'veterinary_id' => 'required|exists:veterinaries,id',
            'request_id' => 'required|exists:requests,id',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Servicio creado exitosamente.');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        // Pasar los datos necesarios para editar el servicio
        $trainers = Trainer::all();
        $veterinarians = Veterinary::all();
        $requests = Request::all();

        return view('services.edit', compact('service', 'trainers', 'veterinarians', 'requests'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
            'trainer_id' => 'required|exists:trainers,id',
            'veterinary_id' => 'required|exists:veterinaries,id',
            'request_id' => 'required|exists:requests,id',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Servicio eliminado.');
    }
}
