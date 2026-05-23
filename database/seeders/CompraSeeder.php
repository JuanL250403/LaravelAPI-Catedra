<?php

namespace Database\Seeders;

use App\Models\Compra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compra::create([
            'fecha_entrega' => '2026-05-20',
            'direccion_envio' =>
            'San Miguel, Colonia El Molino',

            'estado' => true,

            'metodo_pago_id' => 1,

            'user_id' => 1
        ]);
    }
}
