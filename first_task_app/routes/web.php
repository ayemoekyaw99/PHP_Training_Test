<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TaskController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[TaskController::class,'index'])->name('task');
Route::post('/tasks',[TaskController::class,'create'])->name('tasks#create');
Route::get('/task/{id}',[TaskController::class,'delete'])->name('task#delete')
?>