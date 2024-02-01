<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('home.page');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

//Ideas

Route::resource('ideas', IdeaController::class)->except(['index', 'create','show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::post('users/{user}/follow', [FollowController::class, 'follow'])->name('users.follow');
    Route::post('users/{user}/nofollow', [FollowController::class, 'nofollow'])->name('users.nofollow');

    Route::post('ideas/{idea}/like', [FollowController::class, 'like'])->name('ideas.like');
    Route::post('ideas/{idea}/unlike', [FollowController::class, 'unlike'])->name('ideas.unlike');
});


Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware(['auth']);

Route::get('/terms', function() {
    return view('terms');    
})->name('terms');