<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'My New Home'
    ]);
})->name('home');

Route::resource('todos', TodoController::class);
