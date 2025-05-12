<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Trainer;
use App\Models\Veterinary;
use App\Models\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['trainer', 'veterinary', 'request'])
                         ->paginate(10);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        $veterinaries = Veterinarian::all();
        $requests = Request::all();
        
        return view('services.create', compact('trainers', 'veterinaries', 'requests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|date',
            'description' => 'nullable|string',
            'trainer_id' => 'nullable|exists:trainers,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
            'request_id' => 'nullable|exists:requests,id'
        ]);

        Service::create($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully');
    }

    public function show(Service $service)
    {
        $service->load(['trainer', 'veterinary', 'request', 'schedules']);
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $trainers = Trainer::all();
        $veterinaries = Veterinarian::all();
        $requests = Request::all();
        
        return view('services.edit', compact('service', 'trainers', 'veterinaries', 'requests'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|date',
            'description' => 'nullable|string',
            'trainer_id' => 'nullable|exists:trainers,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
            'request_id' => 'nullable|exists:requests,id'
        ]);

        $service->update($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}