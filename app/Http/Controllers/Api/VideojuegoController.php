<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideojeugoRequest;
use App\Http\Resources\VideojuegoResource;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nombre = $request->input('nombre');
        $categoria = $request->input('categoria');

        $videojuegos = null;
        if ($nombre && $categoria) {
            $videojuegos = Videojuego::where('nombre', 'LIKE', '%' . $nombre . '%')
                ->where('categoria_id', $categoria)
                ->get();
        } else if ($categoria) {
            $videojuegos = Videojuego::where('categoria_id', $categoria)->get();
        } else if ($nombre) {
            $videojuegos = Videojuego::where('nombre', 'LIKE', '%' . $nombre . '%')->get();
        } else {
            $videojuegos = Videojuego::all  ();
        }
        return VideojuegoResource::collection($videojuegos);
    }

    public function activos(Request $request)
    {
        $nombre = $request->input('nombre');
        $categoria = $request->input('categoria');

        $videojuegos = null;
        if ($nombre && $categoria) {
            $videojuegos = Videojuego::where('nombre', 'LIKE', '%' . $nombre . '%')
                ->where('categoria_id', $categoria)
                ->where('vigente', true)
                ->get();
        } else if ($categoria) {
            $videojuegos = Videojuego::where('categoria_id', $categoria)->where('vigente', true)->get();
        } else if ($nombre) {
            $videojuegos = Videojuego::where('nombre', 'LIKE', '%' . $nombre . '%')->where('vigente', true)->get();
        } else {
            $videojuegos = Videojuego::where('vigente', true)->get();
        }
        return VideojuegoResource::collection($videojuegos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideojeugoRequest $request)
    {
        $videojuego = Videojuego::create($request->validated());
        return $videojuego;
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return new VideojuegoResource($videojuego);
    }

    public function activo($id)
    {
        $videojuego = Videojuego::where('id', $id)->where('vigente', true)->firstOrFail();
    
        return new VideojuegoResource($videojuego);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(VideojeugoRequest $request, Videojuego $videojuego)
    {
        $videojuego->update($request->validated());
        return new VideojuegoResource($videojuego);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->update([
            'vigente' => !$videojuego->vigente
        ]);

        return response()->json()->setStatusCode(204);
    }
}
