<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoRutaSeeder extends Seeder
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

        $rutaBackendId = DB::table('rutas_aprendizaje')
            ->where('nombre', 'Backend con PHP y Laravel')
            ->value('id');

        $rutaRedesId = DB::table('rutas_aprendizaje')
            ->where('nombre', 'Infraestructura y Automatización de Redes')
            ->value('id');

        $cursosRutas = [
            [
                'curso_id' => $cursoLaravelId,
                'ruta_id' => $rutaBackendId,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursoRedesId,
                'ruta_id' => $rutaRedesId,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('cursos__rutas')->upsert(
            $cursosRutas,
            ['curso_id', 'ruta_id'],
            [
                'orden',
                'updated_at',
            ]
        );
    }
}