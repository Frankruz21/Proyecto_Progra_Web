<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $leccionLaravelId = DB::table('lecciones')
            ->where('titulo', 'Estructura de carpetas y migraciones en Laravel')
            ->value('id');

        $leccionRedesId = DB::table('lecciones')
            ->where('titulo', 'Tablas de enrutamiento y pruebas de conectividad')
            ->value('id');

        $examenes = [
            [
                'leccion_id' => $leccionLaravelId,
                'titulo' => 'Evaluación: Migraciones y Seeders en Laravel',
                'puntaje_minimo' => 75.00,
                'intentos_max' => 2,
                'duracion_min' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'leccion_id' => $leccionRedesId,
                'titulo' => 'Evaluación: Enrutamiento y Diagnóstico de Red',
                'puntaje_minimo' => 70.00,
                'intentos_max' => 3,
                'duracion_min' => 25,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('examenes')->upsert(
            $examenes,
            ['leccion_id'],
            [
                'titulo',
                'puntaje_minimo',
                'intentos_max',
                'duracion_min',
                'updated_at',
            ]
        );
    }
}