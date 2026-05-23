<?php

namespace Database\Seeders;

use App\Models\Videojuego;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideojuegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Videojuego::factory()->count(20)->create();

        Videojuego::create([
            'nombre' => 'FIFA 25',
            'descripcion' => 'Juego de fútbol',
            'cantidad' => 10,
            'vigente' => true,
            'requisitos_de_sistema' => '8GB RAM, GTX 1050',
            'calificacion' => 4.5,
            'precio_unitario' => 59.99,
            'valor_total' => 599.90,
            'categoria_id' => 3
        ]);
    }
}
