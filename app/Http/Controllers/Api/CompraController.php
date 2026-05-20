<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompraResource;
use App\Models\Compra;
use App\Models\DetallesCompra;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::with('detalles')->get();
        return CompraResource::collection($compras);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detalles = $request->input('detalles');
        $compra = $request->input('compra');

        $compraCreada = Compra::create($compra);
        $compraCreada->detalles()->createMany($detalles);
        return new CompraResource($compraCreada->load('detalles'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        return new CompraResource($compra->load('detalles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        $compra->update([
            'estado' => "CANCELADO"
        ]);
    }
}
