<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Все CRUD операции для задач 
Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index']);          // GET /tasks
    Route::post('/', [TaskController::class, 'store']);         // POST /tasks
    Route::get('/{id}', [TaskController::class, 'show']);       // GET /tasks/{id}
    Route::put('/{id}', [TaskController::class, 'update']);     // PUT /tasks/{id}
    Route::delete('/{id}', [TaskController::class, 'destroy']); // DELETE /tasks/{id}
});
