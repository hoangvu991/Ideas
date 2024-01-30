<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'auth'])->name('login.auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout.auth');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');