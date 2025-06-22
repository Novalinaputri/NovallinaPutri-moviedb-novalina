<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use Illuminute\Foundation\Configuration\middleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MovieController::class, 'homepage'])->name('homepage');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.detail');
Route::get('/create-movie', [MovieController::class, 'create'])->middleware('auth');
Route::post('/movie-store', [MovieController::class, 'store'])->middleware('auth');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);