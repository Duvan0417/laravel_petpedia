<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;



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

//rutas de mascotas
Route::resource('/pets', PetController::class);

//ruta de servicios

Route::resource('/services', ServiceController::class);
// ruta de entrenadores

Route::resource('/trainers', TrainerController::class);
//ruta de citas
Route::resource('/appointments', AppointmentController::class);
//tipos
Route::resource('types', TypeController::class);
//solicictudes
Route::resource('requests', RequestController::class);

//adopciones
Route::resource('adoptions', AdoptionController::class);
//foros
Route::resource('/forums', ForumController::class);
//notificaciones
Route::resource('/schedules', ScheduleController::class);

//usuarios
Route::resource('/topics', TopicController::class);

// ruta de  answer
Route::resource('answers', AnswerController::class);

//ruta de /socks
Route::resource('socks', SockController::class);

// ruta de notifications
Route::resource('notifications', NotificationController::class);


