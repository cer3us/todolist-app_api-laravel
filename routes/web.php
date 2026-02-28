<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskWebController;

// Routes для Фронт-энда
Route::resource('tasks', TaskWebController::class);

// Переадресация домашней страницы
Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('home');

Route::get('locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');
