<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RespuestaIntentoSeeder extends Seeder
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

        $respuestas = [
            [
                'intento_id' => $intentoUsuarioId,
                'pregunta_id' => $preguntaLaravelId,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'intento_id' => $intentoAdminId,
                'pregunta_id' => $preguntaRedesId,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('respuestas_intento')->upsert(
            $respuestas,
            ['intento_id', 'pregunta_id'],
            [
                'updated_at',
            ]
        );
    }
}