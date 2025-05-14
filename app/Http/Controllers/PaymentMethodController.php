<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::with('user')->get(); // Cargar la relación
        return view('paymentmethods.index', compact('paymentMethods'));
    }

    public function create()
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('paymentmethods.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|max:255',
            'details' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'CCV' => 'required|integer',
        ]);

        PaymentMethod::create($request->all());
        return redirect()->route('paymentmethods.index')->with('success', 'Método de pago creado exitosamente.');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('paymentmethods.edit', compact('paymentMethod', 'users'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|max:255',
            'details' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'CCV' => 'required|integer',
        ]);

        $paymentMethod->update($request->all());
        return redirect()->route('paymentmethods.index')->with('success', 'Método de pago actualizado exitosamente.');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->route('paymentmethods.index')->with('success', 'Método de pago eliminado exitosamente.');
    }
}