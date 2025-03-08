<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentsController;

Route::get('/', [DashboardController::class,'home']);

Route::middleware(['auth'])->group(function () {
    //logout
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/profile', [AuthController::class,'getprofile']);
    Route::post('/profile', [AuthController::class,'createprofile']);
    Route::put('/profile/{id}', [AuthController::class,'updateprofile']);
    Route::post('/comments/{book_id}', [CommentsController::class,'comments']);
});

// Genre
Route::resource('genre',GenreController::class);
// Book
Route::resource('book',BookController::class);

// Auth
// Register
Route::get('/register', [AuthController::class,'showregister']);
Route::post('/register', [AuthController::class,'registeruser']);

// Login
Route::get('/login', [AuthController::class,'showlogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);

