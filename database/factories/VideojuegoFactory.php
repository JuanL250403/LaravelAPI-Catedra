<?php

namespace Database\Factories;

use App\Models\Videojuego;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Videojuego>
 */
class VideojuegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $precio = fake()->randomFloat(2, 20, 80);
        $cantidad = fake()->numberBetween(1, 20);

        return [

            'nombre' => fake()->words(2, true),

            'descripcion' => fake()->sentence(),

            'cantidad' => $cantidad,

            'vigente' => true,

            'requisitos_de_sistema' =>
            '8GB RAM, GTX 1050',

            'calificacion' =>
            fake()->randomFloat(1, 3, 5),

            'precio_unitario' => $precio,

            'valor_total' => $precio * $cantidad,

            'categoria_id' =>
            rand(1, 5),
        ];
    }
}
