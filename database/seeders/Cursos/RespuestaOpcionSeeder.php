<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RespuestaOpcionSeeder extends Seeder
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

        $usuarioId = DB::table('users')
            ->where('email', 'usuario@sistema.local')
            ->value('id');

        $adminId = DB::table('users')
            ->where('email', 'admin@sistema.local')
            ->value('id');

        $intentoUsuarioId = DB::table('intentos_examen')
            ->where('examen_id', $examenLaravelId)
            ->where('user_id', $usuarioId)
            ->where('numero_intento', 1)
            ->value('id');

        $intentoAdminId = DB::table('intentos_examen')
            ->where('examen_id', $examenRedesId)
            ->where('user_id', $adminId)
            ->where('numero_intento', 1)
            ->value('id');

        $preguntaLaravelId = DB::table('preguntas_examen')
            ->where('examen_id', $examenLaravelId)
            ->value('id');

        $preguntaRedesId = DB::table('preguntas_examen')
            ->where('examen_id', $examenRedesId)
            ->value('id');

        $respuestaUsuarioId = DB::table('respuestas_intento')
            ->where('intento_id', $intentoUsuarioId)
            ->where('pregunta_id', $preguntaLaravelId)
            ->value('id');

        $respuestaAdminId = DB::table('respuestas_intento')
            ->where('intento_id', $intentoAdminId)
            ->where('pregunta_id', $preguntaRedesId)
            ->value('id');

        $opcionLaravelId = DB::table('opciones_pregunta')
            ->where('pregunta_id', $preguntaLaravelId)
            ->where('texto', 'upsert()')
            ->value('id');

        $opcionRedesId = DB::table('opciones_pregunta')
            ->where('pregunta_id', $preguntaRedesId)
            ->where('texto', 'Longest Prefix Match (coincidencia de prefijo más larga)')
            ->value('id');

        $respuestaOpciones = [
            [
                'respuesta_id' => $respuestaUsuarioId,
                'opcion_id' => $opcionLaravelId,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'respuesta_id' => $respuestaAdminId,
                'opcion_id' => $opcionRedesId,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('respuesta_opciones')->upsert(
            $respuestaOpciones,
            ['respuesta_id', 'opcion_id'],
            [
                'updated_at',
            ]
        );
    }
}