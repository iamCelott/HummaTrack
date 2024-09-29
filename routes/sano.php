<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('kanbans', KanbanController::class);
    Route::resource('tasks', TaskController::class);
});
