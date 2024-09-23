<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('departments', [DepartmentController::class, 'index'])->name('admin.department.index');
    Route::post('departments/store', [DepartmentController::class, 'store'])->name('admin.department.store');
    Route::put('departments/{department}/update', [DepartmentController::class, 'update'])->name('admin.department.update');
    Route::delete('departments/{department}/destroy', [DepartmentController::class, 'destroy'])->name('admin.department.delete');
});
