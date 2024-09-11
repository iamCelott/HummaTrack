<?php

use App\Http\Controllers\Prefix\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Prefix\Member\TeamController as MemberTeamController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class);
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('teams', [AdminTeamController::class, 'index'])->name('admin.teams.index');
    Route::post('teams/store', [AdminTeamController::class, 'store'])->name('admin.teams.store');
    Route::put('teams/{team}/update', [AdminTeamController::class, 'update'])->name('admin.teams.update');
    Route::delete('teams/{team}/destroy', [AdminTeamController::class, 'delete'])->name('admin.teams.delete');
});

Route::middleware('auth')->prefix('member')->group(function () {
    Route::get('teams', [MemberTeamController::class, 'index'])->name('member.teams.index');
    Route::post('teams/store', [MemberTeamController::class, 'store'])->name('member.teams.store');
    Route::put('teams/{team}/update', [MemberTeamController::class, 'update'])->name('member.teams.update');
    Route::delete('teams/{team}/destroy', [MemberTeamController::class, 'delete'])->name('member.teams.delete');
});
