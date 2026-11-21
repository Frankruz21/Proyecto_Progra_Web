<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntentoExamenSeeder extends Seeder
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

        $intentos = [
            [
                'examen_id' => $examenLaravelId,
                'user_id' => $usuarioId,
                'numero_intento' => 1,
                'estado' => 'finalizado',
                'puntaje' => 85.00,
                'aprobado' => true,
                'fecha_inicio' => $now->copy()->subMinutes(25),
                'fecha_fin' => $now->copy()->subMinutes(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'examen_id' => $examenRedesId,
                'user_id' => $adminId,
                'numero_intento' => 1,
                'estado' => 'en_progreso',
                'puntaje' => null,
                'aprobado' => false,
                'fecha_inicio' => $now->copy()->subMinutes(5),
                'fecha_fin' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('intentos_examen')->upsert(
            $intentos,
            ['examen_id', 'user_id', 'numero_intento'],
            [
                'estado',
                'puntaje',
                'aprobado',
                'fecha_inicio',
                'fecha_fin',
                'updated_at',
            ]
        );
    }
}