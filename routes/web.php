<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

//ruta de servicios

Route::resource('/service', ServiceController::class);
// ruta de entrenadores
Route::resource('/trainer', TrainerController::class);
//ruta de citas
Route::resource('/appoiner', AppointmentController::class);
//rutas de mascotas
Route::resource('/pet', PetController::class);