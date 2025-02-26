<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class,'home']);
Route::get('/register', [FormController::class,'register']);
Route::post('/welcome', [FormController::class,'kirim']);
