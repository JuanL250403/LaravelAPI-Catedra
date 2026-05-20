<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MetodosPago extends Model
{
    protected $fillable = [
        "nombre"
    ];

    public function compras(): BelongsToMany
    {
        return $this->belongsToMany(Compra::class);
    }
}
