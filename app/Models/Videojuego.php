<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Videojuego extends Model
{
    protected $fillable = [
        "nombre",
        "descripcion",
        "cantidad",
        "estado",
        "requisitos_de_sistema",
        "calificacion",
        "precio_unitario",
        "valor_total",
        "categoria_id"
    ];

    protected $casts = [
        "precio_unitario" => "decimal:2",
        "valor_total" => "decimal:2",
        "calificacion" => "decimal:1"
    ];

    public function categoria() : BelongsTo {
        return $this->belongsTo(Categoria::class);
    }
}
