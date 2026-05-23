<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'password' => bcrypt('12345678'),
                'rol_id' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'María López',
                'email' => 'maria@example.com',
                'password' => bcrypt('12345678'),
                'rol_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Carlos Ramírez',
                'email' => 'carlos@example.com',
                'password' => bcrypt('12345678'),
                'rol_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]

        ]);
    }
}
