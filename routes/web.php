<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public / Guest Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->middleware('guest');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest')
    ->name('register.store');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');


    // Authentication
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    // Todo Creation
    Route::get('/todos/create', [TodoController::class, 'create'])
        ->name('todos.create');

    Route::post('/todos', [TodoController::class, 'store'])
        ->name('todos.store');


    // Todo Completion
    Route::post('/todos/{todo}/toggle', [HomeController::class, 'toggle'])
        ->name('todos.toggle');


    // Todo Editing
    Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])
        ->name('todos.edit');

    Route::put('/todos/{todo}', [TodoController::class, 'update'])
        ->name('todos.update');


    // Todo Deletion
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])
        ->name('todos.destroy');

});