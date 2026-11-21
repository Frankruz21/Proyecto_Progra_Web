<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreguntaExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $examenLaravelId = DB::table('examenes')
            ->where('titulo', 'Evaluación: Migraciones y Seeders en Laravel')
            ->value('id');

        $examenRedesId = DB::table('examenes')
            ->where('titulo', 'Evaluación: Enrutamiento y Diagnóstico de Red')
            ->value('id');

        $preguntas = [
            [
                'examen_id' => $examenLaravelId,
                'enunciado' => '¿Qué método de Query Builder permite insertar o actualizar registros de forma idempotente según columnas únicas?',
                'tipo' => 'opcion_multiple',
                'puntaje' => 50.00,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'examen_id' => $examenRedesId,
                'enunciado' => '¿Qué criterio utiliza un router para elegir entre dos rutas hacia el mismo destino con distinta longitud de máscara?',
                'tipo' => 'opcion_multiple',
                'puntaje' => 50.00,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('preguntas_examen')->upsert(
            $preguntas,
            ['examen_id', 'enunciado'],
            [
                'tipo',
                'puntaje',
                'updated_at',
            ]
        );
    }
}