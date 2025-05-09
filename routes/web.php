<?php

use Illuminate\Support\Facades\Route;

//answer
use App\Http\Controllers\AnswerController;
Route::resource('answers', AnswerController::class);

//socks
use App\Http\Controllers\SockController;
Route::resource('socks', SockController::class);
