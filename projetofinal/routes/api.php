<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\AuthController;

// Rotas públicas
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Rotas protegidas
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('eventos', [EventosController::class, 'index']);
    Route::post('eventos', [EventosController::class, 'store']);
    Route::get('eventos/{id}', [EventosController::class, 'show']);
    Route::put('eventos/{id}', [EventosController::class, 'update']);
    Route::delete('eventos/{id}', [EventosController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
