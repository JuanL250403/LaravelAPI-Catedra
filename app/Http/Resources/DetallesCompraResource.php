<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetallesCompraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'videojuego' => $this->videojuego->nombre,
            'precioVenta' => $this->precio_venta,
            'subTotal' => $this->subTotal,
            'porcentajeIva' => $this->porcentajeIva,
            'iva' => $this->iva,
            'cantidad' => $this->cantidad,
            'total' => $this->total,
            'creado' => $this->created_at?->toDateString(),
            'editado' => $this->updated_at?->toDateString(),
        ];
    }
}
