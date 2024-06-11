<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('usuario', [UsuarioController::class, "index"]);
Route::post('usuario', [UsuarioController::class, "store"]);
Route::put('usuario/{id}', [UsuarioController::class, "update"]);
Route::delete('usuario/{id}', [UsuarioController::class, "destroy"]);