<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('todos.index');
})->name('home');

Route::resource('todos', TodoController::class);
