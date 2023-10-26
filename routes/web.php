<?php

use App\Http\Controllers\TasksController;
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

// GET all tasks
Route::get('/tasks', [TasksController::class, 'index']);

// GET show create form
Route::get('/tasks/create', [TasksController::class, 'create']);

// POST store new task
Route::post('/tasks', [TasksController::class, 'store']);

// GET show edit form
Route::get('/tasks/{task}/edit', [TasksController::class, 'edit']);

// DELETE destroy task
Route::delete('tasks/{task}', [TasksController::class, 'destroy']);

// PUT update task
Route::put('tasks/{task}', [TasksController::class, 'update']);

// GET single task
Route::get('/tasks/{task}', [TasksController::class, 'show']);
