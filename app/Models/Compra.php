<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compra extends Model
{
    protected $fillable = [
        "fecha_entrega",
        "direccion_envio",
        "estado",
        "metodo_pago_id",
        "user_id",
    ];

    protected $cast = [
        "monto" => 'decimal:2',
        "estado" => "boolean",
        "fecha_entrega" => "date",
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function metodoPago(): BelongsTo
    {
        return $this->belongsTo(MetodosPago::class);
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(DetallesCompra::class);
    }

}
