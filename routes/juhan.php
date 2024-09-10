<?php

use App\Http\Controllers\KanbanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::resource('kanban', KanbanController::class);
    Route::resource('users', UserController::class);
});
