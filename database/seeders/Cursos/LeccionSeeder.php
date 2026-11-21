<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $moduloLaravelId = DB::table('modulos')
            ->where('titulo', 'Arquitectura, Migraciones y Seeders')
            ->value('id');

        $moduloRedesId = DB::table('modulos')
            ->where('titulo', 'Fundamentos de Enrutamiento y Conmutación')
            ->value('id');

        $lecciones = [
            [
                'modulo_id' => $moduloLaravelId,
                'titulo' => 'Estructura de carpetas y migraciones en Laravel',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/laravel-migraciones.mp4',
                'contenido' => null,
                'duracion_min' => 18,
                'orden' => 1,
                'es_preview' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $moduloRedesId,
                'titulo' => 'Tablas de enrutamiento y pruebas de conectividad',
                'tipo' => 'lectura',
                'url_contenido' => null,
                'contenido' => 'Revisa cómo se evalúan los prefijos más específicos y valida la conectividad entre subredes.',
                'duracion_min' => 12,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('lecciones')->upsert(
            $lecciones,
            ['modulo_id', 'orden'],
            [
                'titulo',
                'tipo',
                'url_contenido',
                'contenido',
                'duracion_min',
                'es_preview',
                'updated_at',
            ]
        );
    }
}