<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    protected $fillable = [
        "nombre"
    ];

    public function videojuegos() : BelongsToMany {
        return $this->belongsToMany(Videojuego::class);
    }
}
