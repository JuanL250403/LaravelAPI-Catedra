<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompraRequest;
use App\Http\Resources\CompraResource;
use App\Models\Compra;
use App\Models\DetallesCompra;
use App\Models\Videojuego;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::with('detalles', 'usuario')->get();
        return CompraResource::collection($compras);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompraRequest $request)
    {
        $request->validated();
        $detalles = $request->input('detalles');
        $compra = $request->input('compra');

        foreach ($detalles as &$detalle) {
            $detalle['porcentajeIva'] = 13;

            $juego = Videojuego::findOrFail($detalle['videojuego_id']);

            $juego->cantidad = $juego->cantidad - $detalle['cantidad'];
            $juego->save();
        }

        $usuario = auth()->user();
        $compra['user_id'] = $usuario->id;
        $fechaEntrega = date("Y-m-d", strtotime("+5 days"));
        $compra['fecha_entrega'] = $fechaEntrega;

        $compraCreada = Compra::create($compra);
        $compraCreada->detalles()->createMany($detalles);

        return new CompraResource($compraCreada->load('detalles'));
    }

    public function usuario()
    {   
        $usuario = auth()->user();
        $compras = Compra::where('user_id', $usuario->id)->with('detalles')->get();
        return CompraResource::collection($compras);
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
        if($compra->fecha_entrega > new Date()){
            return response()->json(["error" => "La compra ya ha sido entregada"])->setStatusCode(400);
        }
        $compra->update([
            'estado' => false
        ]);

        $compra->detalles->each(function ($d) {
            $d->videojuego->update([
                'cantidad' => $d->videojuego->cantidad + $d->cantidad
            ]);
        });
    }
}
