<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\TeamController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/projects', ProjectController::class);
Route::apiResource('/teams', TeamController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Route::apiResource('/login', App\Http\Controllers\Api\Auth\LoginController::class);
