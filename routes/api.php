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
    Route::post('me', [AuthController::class, 'me'])->middleware(ValidarRol::class . ':Administrador');
});

Route::get('/videojuegos/activo/{id}', [VideojuegoController::class, 'activo']);
Route::get('/compras/usuario', [CompraController::class, 'usuario']);

Route::apiResource('videojuegos', VideojuegoController::class);
Route::apiResource('compras', CompraController::class);
Route::apiResource('metodos', MetodoPagoController::class);
Route::apiResource('categorias', CategoriasController::class);
