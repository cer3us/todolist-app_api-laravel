<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskWebController;

// Routes для Фронт-энда
Route::post('tasks', [TaskWebController::class, 'store'])
    ->middleware('task.limit')
    ->name('tasks.store');
Route::resource('tasks', TaskWebController::class)->except(['store']);


// Переадресация домашней страницы
Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('home');

Route::get('locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');
