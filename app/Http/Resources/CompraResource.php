<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fechaEntrega' => $this->fecha_entrega,
            'direccionEnvio' => $this->direccion_envio,
            'estado' => $this->estado,
            'metodoPago' => $this->metodoPago->nombre,
            'creado' => $this->created_at?->toDateString(),
            'editado' => $this->updated_at?->toDateString(),
            'detalles' => DetallesCompraResource::collection(
                $this->whenLoaded('detalles')
            )
        ];
    }
}
