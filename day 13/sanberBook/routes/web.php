<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class,'home']);
Route::get('/register', [FormController::class,'register']);
Route::post('/welcome', [FormController::class,'kirim']);
Route::get('/genre', [GenreController::class,'index']);
Route::get('/genre/create', [GenreController::class,'create']);
Route::post('/genre', [GenreController::class,'store']);
Route::get('/genre/{genre_id}', [GenreController::class,'show']);
Route::get('/genre/{genre_id}/edit', [GenreController::class,'edit']);
Route::put('/genre/{genre_id}', [GenreController::class,'update']);
Route::delete('/genre/{genre_id}', [GenreController::class,'destroy']);