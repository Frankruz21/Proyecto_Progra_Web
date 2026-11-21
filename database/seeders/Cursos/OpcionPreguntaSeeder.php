<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpcionPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $preguntaLaravelId = DB::table('preguntas_examen')
            ->where('enunciado', '¿Qué método de Query Builder permite insertar o actualizar registros de forma idempotente según columnas únicas?')
            ->value('id');

        $preguntaRedesId = DB::table('preguntas_examen')
            ->where('enunciado', '¿Qué criterio utiliza un router para elegir entre dos rutas hacia el mismo destino con distinta longitud de máscara?')
            ->value('id');

        $opciones = [
            [
                'pregunta_id' => $preguntaLaravelId,
                'texto' => 'upsert()',
                'es_correcta' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'pregunta_id' => $preguntaRedesId,
                'texto' => 'Longest Prefix Match (coincidencia de prefijo más larga)',
                'es_correcta' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('opciones_pregunta')->upsert(
            $opciones,
            ['pregunta_id', 'texto'],
            [
                'es_correcta',
                'updated_at',
            ]
        );
    }
}