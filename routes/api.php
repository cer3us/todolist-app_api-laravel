<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Все CRUD операции для задач 
Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index']);          // GET api//tasks
    Route::post('/', [TaskController::class, 'store']);         // POST api//tasks
    Route::get('/{id}', [TaskController::class, 'show']);       // GET api//tasks/{id}
    Route::patch('/{id}', [TaskController::class, 'update']);   // PATCH api//tasks/{id}
    Route::delete('/{id}', [TaskController::class, 'destroy']); // DELETE api//tasks/{id}
});
