<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CasoPruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $leccionLaravelId = DB::table('lecciones')
            ->where('titulo', 'Estructura de carpetas y migraciones en Laravel')
            ->value('id');

        $leccionRedesId = DB::table('lecciones')
            ->where('titulo', 'Tablas de enrutamiento y pruebas de conectividad')
            ->value('id');

        $ejercicioPhpId = DB::table('ejercicios_codigo')
            ->where('leccion_id', $leccionLaravelId)
            ->value('id');

        $ejercicioPythonId = DB::table('ejercicios_codigo')
            ->where('leccion_id', $leccionRedesId)
            ->value('id');

        $casosPrueba = [
            [
                'ejercicio_id' => $ejercicioPhpId,
                'entrada' => '[{"nombre":"Carlos","activo":true},{"nombre":"Ana","activo":false},{"nombre":"Beatriz","activo":true}]',
                'salida_esperada' => '[{"nombre":"Beatriz","activo":true},{"nombre":"Carlos","activo":true}]',
                'oculto' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'ejercicio_id' => $ejercicioPythonId,
                'entrada' => '["192.168.10.0/24","8.8.8.0/24","10.20.0.0/16"]',
                'salida_esperada' => '["192.168.10.0/24","10.20.0.0/16"]',
                'oculto' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('casos_prueba')->upsert(
            $casosPrueba,
            ['ejercicio_id', 'salida_esperada'],
            [
                'entrada',
                'oculto',
                'updated_at',
            ]
        );
    }
}