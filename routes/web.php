<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeterinarianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\RequestController;

//veterinarias
Route::get('veterinarians', [VeterinarianController::class, 'index'])->name('veterinarians.index');
Route::get('veterinarians/create', [VeterinarianController::class, 'create'])->name('veterinarians.create');
Route::post('veterinarians', [VeterinarianController::class, 'store'])->name('veterinarians.store');
Route::get('veterinarians/{veterinarian}', [VeterinarianController::class, 'show'])->name('veterinarians.show');
Route::get('veterinarians/{veterinarian}/edit', [VeterinarianController::class, 'edit'])->name('veterinarians.edit');
Route::put('veterinarians/{veterinarian}', [VeterinarianController::class, 'update'])->name('veterinarians.update');
Route::delete('veterinarians/{veterinarian}', [VeterinarianController::class, 'destroy'])->name('veterinarians.destroy');

//usuarios
Route::resource('users', UserController::class);
//metodos pago
Route::resource('paymentmethods', PaymentMethodController::class);
//refugios
Route::resource('shelters', ShelterController::class);
//tipos
Route::resource('types', TypeController::class);
//adopciones
Route::resource('adoptions', AdoptionController::class);
//solicictudes
Route::resource('requests', RequestController::class);

