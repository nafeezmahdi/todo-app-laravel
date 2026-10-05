<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/todos/{todo}/toggle', [HomeController::class, 'toggle'])
    ->middleware('auth')
    ->name('todos.toggle');
