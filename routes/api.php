<?php

use App\Http\Controllers\Api\CompraController;
use App\Http\Controllers\Api\VideojuegoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::get('videojuegos/activos', [VideojuegoController::class, 'activos']);

Route::apiResource('videojuegos', VideojuegoController::class);
Route::apiResource('compras', CompraController::class);
