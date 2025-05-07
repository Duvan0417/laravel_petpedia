<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\User;
use App\Models\Shelter;
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
        $appointments = Appointment::all();
        return view('requests.create', compact('users', 'shelters', 'appointments'));
    }

    public function store(HttpRequest $request)
    {
        Request::create($request->all());
        return redirect()->route('requests.index');
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
        $requestModel->update($request->all());
        return redirect()->route('requests.index');
    }

    public function destroy(Request $requestModel)
    {
        $requestModel->delete();
        return redirect()->route('requests.index');
    }
}
