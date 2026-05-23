<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Videojuego extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "nombre",
        "descripcion",
        "cantidad",
        "vigente",
        "requisitos_de_sistema",
        "calificacion",
        "precio_unitario",
        "valor_total",
        "categoria_id"
    ];

    protected $casts = [
        "precio_unitario" => "decimal:2",
        "valor_total" => "decimal:2",
        "calificacion" => "decimal:1",
        'vigente' => 'boolean'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    protected static function booted()
    {
        static::creating(function ($videojuego) {
            $videojuego->valor_total = round($videojuego->cantidad * $videojuego->precio_unitario, 2);
        });

        static::updating(function ($videojuego) {
            $videojuego->valor_total = round($videojuego->cantidad * $videojuego->precio_unitario, 2);
        });
    }
}
