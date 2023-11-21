<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/majors', [MajorController::class, 'index'])->name('majors#list');
Route::get('/major/create', [MajorController::class, 'create'])->name('major#create');
Route::post('/major/store', [MajorController::class, 'store'])->name('major#store');
Route::get('/major/delete/{id}', [MajorController::class, 'delete'])->name('major#delete');
Route::get('/major/edit/{id}', [MajorController::class, 'edit'])->name('major#edit');
Route::post('/major/update/{id}', [MajorController::class, 'update'])->name('major#update');

Route::get('/', [StudentController::class, 'index'])->name('students#list');
Route::get('/student/create', [StudentController::class, 'createStudent'])->name('student#create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student#store');
Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student#delete');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student#edit');
Route::post('/student/update/{id}', [StudentController::class, 'updateStudent'])->name('student#update');