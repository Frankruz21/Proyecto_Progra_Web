<?php

namespace Database\Seeders\Catalogo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $idiomas = [
            [
                'nombre' => 'Español',
                'codigo' => 'es',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Inglés',
                'codigo' => 'en',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('idiomas')->upsert(
            $idiomas,
            ['codigo'],
            [
                'nombre',
                'updated_at',
            ]
        );
    }
}