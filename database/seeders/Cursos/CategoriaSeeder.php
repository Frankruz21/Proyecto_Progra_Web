<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $categorias = [
            [
                'nombre' => 'Redes y Seguridad',
                'slug' => 'redes-y-seguridad',
                'descripcion' => 'Routing, switching, firewalls, VPNs y automatización de infraestructura.',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Desarrollo Web',
                'slug' => 'desarrollo-web',
                'descripcion' => 'Backend, frontend, bases de datos y arquitectura de aplicaciones.',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('categorias')->upsert(
            $categorias,
            ['slug'],
            [
                'nombre',
                'descripcion',
                'activo',
                'updated_at',
            ]
        );
    }
}