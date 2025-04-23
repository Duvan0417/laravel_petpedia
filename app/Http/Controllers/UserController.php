<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo usuario.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'registration_date' => 'nullable|date',
        ]);

        // Si no se proporciona una fecha de registro, usar la fecha actual
        if (!isset($validated['registration_date'])) {
            $validated['registration_date'] = now();
        }

        // Encriptar la contraseña
        $validated['password'] = Hash::make($validated['password']);

        // Crear el usuario
        User::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('users.index')
                         ->with('success', 'Usuario registrado exitosamente.');
    }

    /**
     * Muestra la lista de usuarios.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Muestra la información de un usuario específico.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Actualiza un usuario existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|string|max:15',
            'registration_date' => 'nullable|date',
        ]);

        // Actualizar los datos del usuario
        $user->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('users.index')
                         ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Elimina un usuario de la base de datos.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('users.index')
                         ->with('success', 'Usuario eliminado exitosamente.');
    }
}