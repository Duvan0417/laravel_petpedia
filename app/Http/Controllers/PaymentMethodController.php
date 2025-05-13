<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\shelter;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request as HttpRequest;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::with('user')->latest()->get();
        return view('paymentmethods.index', compact('paymentMethods'));
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
            'type' => 'required|string|max:50',
            'details' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'CCV' => 'required|integer|digits_between:3,4',
        ]);

        PaymentMethod::create($validated);

        return redirect()->route('paymentmethods.index')
            ->with('success', 'Método de pago creado exitosamente.');
    }

    public function show(PaymentMethod $paymentMethod)
    {
        return view('paymentmethods.show', compact('paymentMethod'));
    }
public function edit($id)
{
    $paymentMethod = PaymentMethod::findOrFail($id);
    $users = User::all();
    return view('paymentmethods.edit', compact('paymentMethod', 'users'));
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

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        return redirect()->route('paymentmethods.index')
            ->with('success', 'Método de pago eliminado exitosamente.');
    }
}