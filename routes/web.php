<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index']);

Route::post('/idea', [IdeaController::class, 'store']);

Route::put('/ideas/{idea}/update', [IdeaController::class, 'update'])->name('idea.update')->middleware('auth');

Route::delete('/ideas/{idea}', [IdeaController::class, 'delete'])->name('idea.delete')->middleware('auth');;

Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit')->middleware('auth');;

Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store')->middleware('auth');;

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'auth'])->name('login.auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout.auth');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');


Route::get('/terms', function() {
    return view('terms');    
});