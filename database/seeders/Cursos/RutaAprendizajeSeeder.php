<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RutaAprendizajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $rutas = [
            [
                'nombre' => 'Backend con PHP y Laravel',
                'descripcion' => 'Ruta enfocada en modelado relacional, migraciones, seeders, APIs REST y buenas prácticas de arquitectura.',
                'imagen' => 'rutas/backend-laravel.jpg',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Infraestructura y Automatización de Redes',
                'descripcion' => 'Ruta orientada a enrutamiento, conmutación, seguridad perimetral y automatización de dispositivos.',
                'imagen' => null,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('rutas_aprendizaje')->upsert(
            $rutas,
            ['nombre'],
            [
                'descripcion',
                'imagen',
                'activo',
                'updated_at',
            ]
        );
    }
}