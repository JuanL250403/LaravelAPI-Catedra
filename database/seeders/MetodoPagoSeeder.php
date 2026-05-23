<?php

namespace Database\Seeders;

use App\Models\MetodosPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metodos = [
            'Tarjeta Crédito',
            'PayPal',
            'Transferencia'
        ];

        foreach ($metodos as $metodo) {

            MetodosPago::create([
                'nombre' => $metodo
            ]);

        }
    }
}
