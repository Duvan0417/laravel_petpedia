<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Veterinarian;
use App\Models\Trainer;
use App\Models\Request as ServiceRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $services = Service::with(['veterinarian', 'trainer', 'request'])->get();
    return view('services.index', compact('services'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $veterinarians = Veterinarian::all();
        $trainers = Trainer::all();
        $requests = ServiceRequest::all();
        
        return view('services.create', compact('veterinarians', 'trainers', 'requests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|date',
            'description' => 'nullable|string',
            'veterinarian_id' => 'nullable|exists:veterinarians,id',
            'trainer_id' => 'nullable|exists:trainers,id',
            'request_id' => 'nullable|exists:requests,id',
        ]);

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $veterinarians = Veterinarian::all();
        $trainers = Trainer::all();
        $requests = ServiceRequest::all();
        
        return view('services.edit', compact('service', 'veterinarians', 'trainers', 'requests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|date',
            'description' => 'nullable|string',
            'veterinarian_id' => 'nullable|exists:veterinarians,id',
            'trainer_id' => 'nullable|exists:trainers,id',
            'request_id' => 'nullable|exists:requests,id',
        ]);

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}