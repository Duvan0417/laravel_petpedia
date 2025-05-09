<?php

namespace App\Http\Controllers;

use App\Models\RequestModel; // Cambiado de Request por conflicto con clase Request
use App\Models\Service;
use App\Models\Trainer;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['trainer', 'veterinarian', 'request'])->latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $trainers = Trainer::where('active', true)->get();
        $veterinarians = Veterinarian::where('active', true)->get();
        $requests = RequestModel::pending()->get();

        return view('services.create', compact('trainers', 'veterinarians', 'requests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
            'trainer_id' => 'required|exists:trainers,id',
            'veterinarian_id' => 'required|exists:veterinarians,id',
            'request_id' => 'required|exists:requests,id',
        ]);

        Service::create($validated);

        return redirect()->route('services.index')
                         ->with('success', 'Servicio creado exitosamente.');
    }

    public function show(Service $service)
    {
        return view('services.show', [
            'service' => $service->load(['trainer', 'veterinarian', 'request'])
        ]);
    }

    public function edit(Service $service)
    {
        $trainers = Trainer::where('active', true)->get();
        $veterinarians = Veterinarian::where('active', true)->get();
        $requests = RequestModel::pending()->get();

        return view('services.edit', compact('service', 'trainers', 'veterinarians', 'requests'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
            'trainer_id' => 'required|exists:trainers,id',
            'veterinarian_id' => 'required|exists:veterinarians,id',
            'request_id' => 'required|exists:requests,id',
        ]);

        $service->update($validated);

        return redirect()->route('services.index')
                         ->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
                         ->with('success', 'Servicio eliminado correctamente.');
    }
}
