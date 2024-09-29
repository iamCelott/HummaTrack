<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
    Route::get('category-task', [DepartmentController::class, 'index'])->name('admin.department.index');
    Route::post('category-task/store', [DepartmentController::class, 'store'])->name('admin.department.store');
    Route::put('category-task/{department}/update', [DepartmentController::class, 'update'])->name('admin.department.update');
    Route::delete('category-task/{department}/destroy', [DepartmentController::class, 'destroy'])->name('admin.department.delete');
});
