<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('home.page');

//Ideas

Route::resource('ideas', IdeaController::class)->except(['index', 'create','show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::post('users/{user}/follow', [FollowController::class, 'follow'])->name('users.follow');

    Route::post('users/{user}/nofollow', [FollowController::class, 'nofollow'])->name('users.nofollow');
});

Route::get('/terms', function() {
    return view('terms');    
});