<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetallesCompra extends Model
{
    protected $fillable = [
        "compra_id",
        "videojuego_id",
        "precio_venta",
        "cantidad",
        "subTotal",
        "porcentajeIva",
        "iva",
        "total"
    ];

    protected $casts = [
        "subTotal" => "decimal:2",
        "porcentajeIva" => "decimal:2",
        "iva" => "decimal:2",
        "total" => "decimal:2",
        "precio_venta" => "decimal:2",
    ];

    public function compra(): BelongsTo
    {
        return $this->belongsTo(Compra::class);
    }

    public function videojuego(): BelongsTo
    {
        return $this->belongsTo(Videojuego::class);
    }

    protected static function booted()
    {
        static::creating(function ($detalle) {
            $detalle->precio_venta = $detalle->videojuego->precio_unitario;
            $detalle->subTotal = $detalle->videojuego->precio_unitario * $detalle->cantidad;
            $detalle->iva = $detalle->subTotal * ($detalle->porcentajeIva / 100);
            $detalle->total= $detalle->iva + $detalle->subTotal;
        });
    }
}
