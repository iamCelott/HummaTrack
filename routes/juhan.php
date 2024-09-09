<?php

use App\Http\Controllers\KanbanController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::resource('kanban', KanbanController::class);
});