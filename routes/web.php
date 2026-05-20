<?php

use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\VideojuegoControllerAdmin;
use App\Http\Controllers\VideojuegoControllerUsuario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::resource('usuario/juegos', VideojuegoControllerUsuario::class)->only(['index', 'show']);
Route::resource('admin/juegos', VideojuegoControllerAdmin::class);