<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
// Mostrar formulario de creaciónuse App\Http\Controllers\TrainerController;
//entrenadores

Route::get('/entrenadores/crear', [TrainerController::class, 'create'])->name('trainers.create');
Route::post('/entrenadores', [TrainerController::class, 'store'])->name('trainers.store');
Route::get('/entrenadores', [TrainerController::class, 'index'])->name('trainers.index');
Route::get('/entrenadores/{trainer}', [TrainerController::class, 'show'])->name('trainers.show');
Route::get('/entrenadores/{trainer}/editar', [TrainerController::class, 'edit'])->name('trainers.edit');
Route::put('/entrenadores/{trainer}', [TrainerController::class, 'update'])->name('trainers.update');
Route::delete('/entrenadores/{trainer}', [TrainerController::class, 'destroy'])->name('trainers.destroy');


//servicios


// Mostrar el formulario para crear un nuevo servicio
Route::get('/servicios/crear', [ServiceController::class, 'create'])->name('services.create');

// Guardar un nuevo servicio
Route::post('/servicios', [ServiceController::class, 'store'])->name('services.store');

// Mostrar todos los servicios
Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');

// Mostrar un servicio específico
Route::get('/servicios/{service}', [ServiceController::class, 'show'])->name('services.show');

// Mostrar el formulario para editar un servicio existente
Route::get('/servicios/{service}/editar', [ServiceController::class, 'edit'])->name('services.edit');

// Actualizar un servicio existente
Route::put('/servicios/{service}', [ServiceController::class, 'update'])->name('services.update');

// Eliminar un servicio
Route::delete('/servicios/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');


//roles
use App\Http\Controllers\RoleController;

// Mostrar el formulario para crear un nuevo rol
Route::get('/roles/crear', [RoleController::class, 'create'])->name('roles.create');

// Guardar un nuevo rol
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');

// Mostrar todos los roles
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

// Mostrar un rol específico
Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');

// Mostrar el formulario para editar un rol existente
Route::get('/roles/{role}/editar', [RoleController::class, 'edit'])->name('roles.edit');

// Actualizar un rol existente
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');

// Eliminar un rol
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');



//pets
use App\Http\Controllers\PetController;

// Mostrar el formulario para crear una nueva mascota
Route::get('/mascotas/crear', [PetController::class, 'create'])->name('pets.create');

// Guardar una nueva mascota
Route::post('/mascotas', [PetController::class, 'store'])->name('pets.store');

// Mostrar todas las mascotas
Route::get('/mascotas', [PetController::class, 'index'])->name('pets.index');

// Mostrar una mascota específica
Route::get('/mascotas/{pet}', [PetController::class, 'show'])->name('pets.show');

// Mostrar el formulario para editar una mascota existente
Route::get('/mascotas/{pet}/editar', [PetController::class, 'edit'])->name('pets.edit');

// Actualizar una mascota existente
Route::put('/mascotas/{pet}', [PetController::class, 'update'])->name('pets.update');

// Eliminar una mascota
Route::delete('/mascotas/{pet}', [PetController::class, 'destroy'])->name('pets.destroy');
