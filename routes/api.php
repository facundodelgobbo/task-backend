<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Tasks\IndexController;
use App\Http\Controllers\Tasks\StoreController;
use App\Http\Controllers\Tasks\UpdateController;
use App\Http\Controllers\Tasks\DestroyController;

// Rutas de autenticación
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

// Rutas protegidas para tareas
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [IndexController::class, 'index']);
    Route::post('/tasks', [StoreController::class, 'store']);
    Route::put('/tasks/{id}', [UpdateController::class, 'update']);
    Route::delete('/tasks/{id}', [DestroyController::class, 'destroy']);
});
