<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', [MovieController::class, 'homepage'])->name('homepage');

// Detail movie
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.detail');

// Login/logout
Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Create & Store Movie - BISA DIAKSES SEMUA USER YANG LOGIN
Route::get('/create-movie', [MovieController::class, 'create'])->name('movies.create')->middleware('auth');
Route::post('/movie-store', [MovieController::class, 'store'])->name('movies.store')->middleware('auth');

// Edit, Update, Delete Movie - JUGA UNTUK SEMUA USER LOGIN
Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit')->middleware('auth');
Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update')->middleware('auth');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy')->middleware('auth');

