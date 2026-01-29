<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::controller(RegisteredUserController::class)->group(function () {
        Route::get('/register', 'create')
            ->name('register');

        Route::post('/register', 'store');
    });

    Route::controller(AuthenticatedSessionController::class)->group(function () {
        Route::get('/login', 'create')
            ->name('login');

        Route::post('/login', 'store');
    });
});

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/todos');

    Route::patch('/todos/{todo}/complete', [TodoController::class, 'complete'])
        ->can('complete', 'todo')
        ->name('todos.complete');

    Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])
        ->can('update', 'todo')
        ->name('todos.edit');

    Route::patch('/todos/{todo}', [TodoController::class, 'update'])
        ->can('update', 'todo')
        ->name('todos.update');

    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])
        ->can('delete', 'todo')
        ->name('todos.destroy');

    Route::resource('todos', TodoController::class)->only([
        'index',
        'create',
        'store',
        'show',
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/demo', function (Request $request) {
    return 'User has Admin rights '.$request->user()->hasRole('admin');
})->middleware('role:admin');
