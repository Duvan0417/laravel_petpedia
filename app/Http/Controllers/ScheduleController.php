<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::included()->filter()->get();
        return response()->json($schedules);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'hour' => 'required|integer|between:0,23',
            'location' => 'required|string|max:255',
            'service_id' => 'nullable|exists:services,id'
        ]);

        $schedule = Schedule::create($request->all());
        return response()->json($schedule);
    }

    public function show($id)
    {
        $schedule = Schedule::included()->findOrFail($id);
        return response()->json($schedule);
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
        return response()->json($schedule);
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json(['message' => 'Horario eliminado correctamente']);
    }
}
