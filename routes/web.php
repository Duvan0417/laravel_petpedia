<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/topics/create', [TopicController::class, 'create'])->name('topics.create');
Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');
Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
Route::get('/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
Route::get('/topics/{topic}/edit', [TopicController::class, 'edit'])->name('topics.edit');
Route::put('/topics/{topic}', [TopicController::class, 'update'])->name('topics.update');
Route::delete('/topics/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');




Route::get('/forums/create', [ForumController::class, 'create'])->name('forums.create');
Route::post('/forums', [ForumController::class, 'store'])->name('forums.store');
Route::get('/forums', [ForumController::class, 'index'])->name('forums.index');
Route::get('/forums/{forum}', [ForumController::class, 'show'])->name('forums.show');
Route::get('/forums/{forum}/edit', [ForumController::class, 'edit'])->name('forums.edit');
Route::put('/forums/{forum}', [ForumController::class, 'update'])->name('forums.update');
Route::delete('/forums/{forum}', [ForumController::class, 'destroy'])->name('forums.destroy');


Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/{schedule}', [ScheduleController::class, 'show'])->name('schedules.show');
Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('/schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');
