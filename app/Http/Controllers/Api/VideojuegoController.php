<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideojuegoResource;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videojuegos = Videojuego::all();
        return VideojuegoResource::collection($videojuegos);
    }

    public function activos()
    {
        $videojuegos = Videojuego::where('estado', 'Disponible')->get();
        return VideojuegoResource::collection($videojuegos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $videojuego = Videojuego::create($request->all());
        return new VideojuegoResource($videojuego);
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return new VideojuegoResource($videojuego);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videojuego $videojuego)
    {
        $videojuego->update($request->all());
        return new VideojuegoResource($videojuego);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->update([
            'estado' => 'INACTIVO'
        ]);
    }
}
