<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

  Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});

Route::get('/demo', function (Request $request) {
  return 'User has Admin rights ' . $request->user()->hasRole('admin');
})->middleware('role:admin');

require __DIR__ . '/auth.php';
