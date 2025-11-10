<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/create', [CareerController::class, 'create'])->name('careers.create');
Route::post('/careers/store', [CareerController::class, 'store'])->name('careers.store');
Route::get('/careers/edit/{id}', [CareerController::class, 'edit'])->name('careers.edit');
Route::put('/careers/update/{id}', [CareerController::class, 'update'])->name('careers.update');
Route::delete('/careers/delete/{id}', [CareerController::class, 'delete'])->name('careers.delete');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/delete/{id}', [StudentController::class, 'delete'])->name('students.delete');
Route::get('/students/show/{id}', [StudentController::class, 'show'])->name('students.show');
