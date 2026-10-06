<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

    Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest')
    ->name('register.store');

Route::get('/todos/create', [TodoController::class, 'create'])
    ->middleware('auth')
    ->name('todos.create');

Route::post('/todos', [TodoController::class, 'store'])
    ->middleware('auth')
    ->name('todos.store');

Route::post('/todos/{todo}/toggle', [HomeController::class, 'toggle'])
    ->middleware('auth')
    ->name('todos.toggle');


Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])
    ->middleware('auth')
    ->name('todos.edit');

Route::put('/todos/{todo}', [TodoController::class, 'update'])
    ->middleware('auth')
    ->name('todos.update');

Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])
    ->middleware('auth')
    ->name('todos.destroy');