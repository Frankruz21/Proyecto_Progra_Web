<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $adminId = DB::table('users')
            ->where('email', 'admin@sistema.local')
            ->value('id');

        $usuarioId = DB::table('users')
            ->where('email', 'usuario@sistema.local')
            ->value('id');

        $cursoLaravelId = DB::table('cursos')
            ->where('slug', 'fundamentos-de-laravel-y-apis-rest')
            ->value('id');

        $cursoRedesId = DB::table('cursos')
            ->where('slug', 'redes-empresariales-y-automatizacion-con-python')
            ->value('id');

        $testimonios = [
            [
                'texto' => 'Muy claro y práctico para estructurar proyectos desde cero con migraciones, seeders y endpoints limpios.',
                'calificacion' => 5,
                'aprobado' => true,
                'user_id' => $usuarioId,
                'curso_id' => $cursoLaravelId,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'texto' => 'Buen enfoque en topologías reales y automatización; ayuda a validar conceptos con práctica directa.',
                'calificacion' => 4,
                'aprobado' => false,
                'user_id' => $adminId,
                'curso_id' => $cursoRedesId,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('testimonios')->upsert(
            $testimonios,
            ['user_id', 'curso_id'],
            [
                'texto',
                'calificacion',
                'aprobado',
                'updated_at',
            ]
        );
    }
}