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
                [
                    'nombre' => 'Portugués',
                    'codigo' => 'pt',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'nombre' => 'Francés',
                    'codigo' => 'fr',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'nombre' => 'Alemán',
                    'codigo' => 'de',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'nombre' => 'Italiano',
                    'codigo' => 'it',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'nombre' => 'Japonés',
                    'codigo' => 'ja',
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