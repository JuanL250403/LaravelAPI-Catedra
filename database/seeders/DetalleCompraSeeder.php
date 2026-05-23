<?php

namespace Database\Seeders;

use App\Models\DetallesCompra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetallesCompra::create([

            'compra_id' => 1,

            'videojuego_id' => 1,

            'cantidad' => 1,

            'subTotal' => 53.09,

            'precio_venta' => 59.99,

            'porcentajeIva' => 13,

            'iva' => 6.90,

            'total' => 59.99,
        ]);
    }
}
