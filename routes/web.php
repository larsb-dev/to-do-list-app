<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Mail\AccountCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/mailable', function () {
    $user = request()->user();

    Mail::to($user)->send(new AccountCreated($user));
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('/', '/todos');

    Route::patch('/todos/{todo}/complete', [TodoController::class, 'complete'])
        ->name('todos.complete');

    Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])
        ->name('todos.edit');

    Route::patch('/todos/{todo}', [TodoController::class, 'update'])
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');

    Route::patch('/profile', [ProfileController::class, 'update']);

    Route::delete('/profile', [ProfileController::class, 'destroy']);
});

require __DIR__.'/auth.php';
