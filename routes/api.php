<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Prefix\Member\TeamController as MemberTeamController;
use App\Http\Controllers\ProjectController as ControllersProjectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/projects', ProjectController::class);
Route::apiResource('/teams', TeamController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::post('/teams/search_user', [MemberTeamController::class, 'team_search_user'])->name('api.team_search_user');
Route::post('/projects/search_team', [ControllersProjectController::class, 'project_search_team'])->name('api.project_search_team');

// Route::apiResource('/login', App\Http\Controllers\Api\Auth\LoginController::class);
