<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('task.index');
});

Route::get('/',[TaskController::class,'index']);
Route::post('/tasks/store',[TaskController::class,'store']);
Route::post('/tasks/status/{id}',[TaskController::class,'status']);
Route::get('/tasks/edit/{id}',[TaskController::class,'edit']);
Route::post('/tasks/update/{id}',[TaskController::class,'update']);
Route::get('/tasks/delete/{id}',[TaskController::class,'delete']);
