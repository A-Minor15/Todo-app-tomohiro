<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/todo-list', [TodoController::class, 'index'])->name('index');
Route::get('/{id}/todo-list', [TodoController::class, 'edit']);
Route::post('/todo-list', [TodoController::class, 'store']);
Route::put('/{id}/todo-list', [TodoController::class, 'update']);
Route::delete('/{id}/todo-list', [TodoController::class, 'destroy']);
