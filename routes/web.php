<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index']);

Route::post('/idea', [IdeaController::class, 'store']);

Route::put('/ideas/{idea}/update', [IdeaController::class, 'update'])->name('idea.update');

Route::delete('/ideas/{idea}', [IdeaController::class, 'delete'])->name('idea.delete');

Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');


Route::get('/terms', function() {
    return view('terms');    
});