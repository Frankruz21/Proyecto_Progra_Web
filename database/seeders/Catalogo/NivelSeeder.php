<?php

namespace Database\Seeders\Catalogo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $niveles = [
            [
                'nombre' => 'Principiante',
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Intermedio',
                'orden' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Avanzado',
                'orden' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('niveles')->upsert(
            $niveles,
            ['nombre'],
            [
                'orden',
                'updated_at',
            ]
        );
    }
}