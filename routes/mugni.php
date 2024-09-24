<?php

use App\Http\Controllers\TimeLineController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::resource('calendar', TimeLineController::class);
});
