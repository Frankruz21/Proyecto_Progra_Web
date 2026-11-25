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

        $usersIds = DB::table('users')
            ->orderBy('id')
            ->pluck('id')
            ->values();

        if ($usersIds->isEmpty()) {
            return;
        }

        $usuarioPrincipalId = DB::table('users')
            ->where('email', 'usuario@sistema.local')
            ->value('id') ?? $usersIds->first();

        $adminId = DB::table('users')
            ->where('email', 'admin@sistema.local')
            ->value('id') ?? ($usersIds->get(1) ?? $usuarioPrincipalId);

        $tercerUsuarioId = $usersIds->get(2) ?? $usuarioPrincipalId;

        $cursos = DB::table('cursos')->pluck('id', 'slug');

        if ($cursos->isEmpty()) {
            return;
        }

        $candidatos = [
            [
                'texto' => 'Muy claro y práctico para estructurar proyectos desde cero con migraciones, seeders y endpoints limpios.',
                'calificacion' => 5,
                'aprobado' => true,
                'user_id' => $usuarioPrincipalId,
                'curso_id' => $cursos['fundamentos-de-laravel-y-apis-rest'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'texto' => 'Buen enfoque en topologías reales y automatización; ayuda a validar conceptos con práctica directa.',
                'calificacion' => 4,
                'aprobado' => false,
                'user_id' => $adminId,
                'curso_id' => $cursos['redes-empresariales-y-automatizacion-con-python'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'texto' => 'Excelente explicación sobre normalización, llaves foráneas e índices; evita muchos errores en bases relacionales.',
                'calificacion' => 5,
                'aprobado' => true,
                'user_id' => $usuarioPrincipalId,
                'curso_id' => $cursos['modelado-relacional-y-sql-avanzado'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'texto' => 'Ayuda mucho a pensar en complejidad y elegir bien entre estructuras antes de tirar código a ciegas.',
                'calificacion' => 5,
                'aprobado' => true,
                'user_id' => $tercerUsuarioId,
                'curso_id' => $cursos['estructuras-de-datos-y-algoritmos'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'texto' => 'Los ejemplos de contenedores y flujos automatizados dejan muy claro cómo llevar un proyecto a producción.',
                'calificacion' => 4,
                'aprobado' => true,
                'user_id' => $usuarioPrincipalId,
                'curso_id' => $cursos['docker-linux-y-pipelines-ci-cd'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'texto' => 'Muy útil para repasar leyes de circuitos, simplificación lógica y diseño combinacional paso a paso.',
                'calificacion' => 4,
                'aprobado' => false,
                'user_id' => $tercerUsuarioId,
                'curso_id' => $cursos['circuitos-electricos-y-logica-digital'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'texto' => 'Conecta bien la parte estadística y de evaluación con modelos prácticos sin quedarse solo en teoría.',
                'calificacion' => 5,
                'aprobado' => true,
                'user_id' => $adminId,
                'curso_id' => $cursos['probabilidad-y-fundamentos-de-machine-learning'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'texto' => 'Buen hábito de trabajo con pruebas y ramas limpias; se nota la diferencia al mantener proyectos en equipo.',
                'calificacion' => 4,
                'aprobado' => true,
                'user_id' => $tercerUsuarioId,
                'curso_id' => $cursos['pruebas-automatizadas-y-git-en-flujos-de-equipo'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        $testimonios = [];
        foreach ($candidatos as $item) {
            if (! empty($item['user_id']) && ! empty($item['curso_id'])) {
                $clave = $item['user_id'].'-'.$item['curso_id'];
                $testimonios[$clave] = $item;
            }
        }

        if ($testimonios === []) {
            return;
        }

        DB::table('testimonios')->upsert(
            array_values($testimonios),
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