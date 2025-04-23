<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeterinarianController;
use App\Http\Controllers\UserController;

//veterinarias
Route::get('/registroVeterinario', [VeterinarianController::class, 'create'])->name('veterinarians.create');
Route::post('/crearVeterinario', [VeterinarianController::class, 'store'])->name('veterinarians.store');
Route::get('/veterinarios', [VeterinarianController::class, 'index'])->name('veterinarians.index');

//usuarios
Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
Route::get('/usuarios/crear', [UserController::class, 'create'])->name('users.create');
Route::post('/usuarios', [UserController::class, 'store'])->name('users.store');