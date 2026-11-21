<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuloSeeder extends Seeder
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

        $modulos = [
            [
                'curso_id' => $cursoLaravelId,
                'titulo' => 'Arquitectura, Migraciones y Seeders',
                'descripcion' => 'Estructura del proyecto, definición de tablas y automatización de datos iniciales.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursoRedesId,
                'titulo' => 'Fundamentos de Enrutamiento y Conmutación',
                'descripcion' => 'Segmentación, tablas de enrutamiento y diagnóstico básico de conectividad.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('modulos')->upsert(
            $modulos,
            ['curso_id', 'orden'],
            [
                'titulo',
                'descripcion',
                'activo',
                'updated_at',
            ]
        );
    }
}