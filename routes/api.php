<?php

use App\Http\Controllers\Api\CategoriasController;
use App\Http\Controllers\Api\CompraController;
use App\Http\Controllers\Api\MetodoPagoController;
use App\Http\Controllers\Api\VideojuegoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\ValidarRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/login", function () {
    return response()->json(['error' => 'No autneticado'], 401);
})->name('login');

Route::get('videojuegos/activos', [VideojuegoController::class, 'activos']);


Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::get('refresco', [AuthController::class, 'refresh']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('registro', [AuthController::class, 'registro']);
});

Route::middleware([ValidarRol::class])->group(function () {
    Route::get('/videojuegos', [VideojuegoController::class, 'index']);
    Route::get('/videojuegos/activos/{id}', [VideojuegoController::class, 'activo']);

    Route::post('/compras', [CompraController::class, 'store']);
    Route::get('/compras/usuario', [CompraController::class, 'usuario']);
    Route::apiResource('metodos', MetodoPagoController::class);
    Route::apiResource('categorias', CategoriasController::class);
});

Route::middleware([ValidarRol::class . ':Administrador'])->group(function () {
    Route::post('/videojuegos', [VideojuegoController::class, 'store']);
    Route::get('/videojuegos/{id}', [VideojuegoController::class, 'show']);
    Route::put('/videojuegos/{id}', [VideojuegoController::class, 'update']);
    Route::delete('/videojuegos/{id}', [VideojuegoController::class, 'destroy']);

    Route::get('/compras', [CompraController::class, 'index']);
    Route::get('/compras/{id}', [CompraController::class, 'show']);
    Route::delete('/compras/{id}', [CompraController::class, 'destroy']);
});
