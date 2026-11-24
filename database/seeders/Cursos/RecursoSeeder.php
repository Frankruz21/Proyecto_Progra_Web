<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $cursoLaravelId = DB::table('cursos')
            ->where('slug', 'fundamentos-de-laravel-y-apis-rest')
            ->value('id');

        $cursoRedesId = DB::table('cursos')
            ->where('slug', 'redes-empresariales-y-automatizacion-con-python')
            ->value('id');

        $leccionLaravelId = DB::table('lecciones')
            ->where('titulo', 'Estructura de carpetas y migraciones en Laravel')
            ->value('id');

        $leccionRedesId = DB::table('lecciones')
            ->where('titulo', 'Tablas de enrutamiento y pruebas de conectividad')
            ->value('id');

        $adminId = DB::table('users')
            ->where('email', 'admin@sistema.local')
            ->value('id');

        $usuarioId = DB::table('users')
            ->where('email', 'usuario@sistema.local')
            ->value('id');

        $recursos = [
            [
                'curso_id' => $cursoLaravelId,
                'leccion_id' => $leccionLaravelId,
                'titulo' => 'Guía de migraciones y seeders en Laravel',
                'tipo' => 'guia',
                'nombre_original' => 'guia-migraciones-laravel.pdf',
                'nombre_almacenado' => 'rec_laravel_migraciones_01.pdf',
                'extension' => 'pdf',
                'mime_type' => 'application/pdf',
                'tamano_bytes' => 524288,
                'ruta' => 'recursos/cursos/laravel/rec_laravel_migraciones_01.pdf',
                'subido_por' => $adminId,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursoRedesId,
                'leccion_id' => $leccionRedesId,
                'titulo' => 'Scripts base de automatización de red',
                'tipo' => 'codigo_fuente',
                'nombre_original' => 'scripts-red-python.zip',
                'nombre_almacenado' => 'rec_redes_scripts_01.zip',
                'extension' => 'zip',
                'mime_type' => 'application/zip',
                'tamano_bytes' => 1048576,
                'ruta' => 'recursos/cursos/redes/rec_redes_scripts_01.zip',
                'subido_por' => $usuarioId,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('recursos')->upsert(
            $recursos,
            ['curso_id', 'nombre_almacenado'],
            [
                'leccion_id',
                'titulo',
                'tipo',
                'nombre_original',
                'extension',
                'mime_type',
                'tamano_bytes',
                'ruta',
                'subido_por',
                'updated_at',
            ]
        );
    }
}