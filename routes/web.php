<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;




Route::resource('answers', AnswerController::class);
