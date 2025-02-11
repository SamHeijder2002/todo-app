<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::redirect('/', '/tasks');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::post('tasks/{task}/assign', [TaskController::class, 'assign'])->name('tasks.assign');
    Route::post('tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
