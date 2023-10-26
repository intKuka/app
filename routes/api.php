<?php

use App\Http\Controllers\Api\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// GET all tasks
Route::get('/tasks', [TasksController::class, 'index']);

// POST store new task
Route::post('/tasks', [TasksController::class, 'store']);

// DELETE destroy task
Route::delete('tasks/{id}', [TasksController::class, 'destroy']);

// PUT update task
Route::put('tasks/{id}', [TasksController::class, 'update']);

// GET single task
Route::get('/tasks/{id}', [TasksController::class, 'show']);
