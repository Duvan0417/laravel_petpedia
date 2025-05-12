<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Service;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('service')->paginate(10);
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $services = Service::all();
        return view('schedules.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'hour' => 'required|integer|between:0,23',
            'location' => 'required|string|max:255',
            'service_id' => 'nullable|exists:services,id'
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')
            ->with('success', 'Horario creado correctamente');
    }

    public function show(Schedule $schedule)
    {
        $schedule->load('service');
        return view('schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $services = Service::all();
        return view('schedules.edit', compact('schedule', 'services'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'date' => 'required|date',
            'hour' => 'required|integer|between:0,23',
            'location' => 'required|string|max:255',
            'service_id' => 'nullable|exists:services,id'
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')
            ->with('success', 'Horario actualizado correctamente');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')
            ->with('success', 'Horario eliminado correctamente');
    }
}