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
            [
                'nombre' => 'Bases de Datos e Ingeniería de Datos',
                'slug' => 'bases-de-datos-e-ingenieria-de-datos',
                'descripcion' => 'Modelado relacional, SQL avanzado, procedimientos almacenados y almacenes de datos.',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Programación y Algoritmos',
                'slug' => 'programacion-y-algoritmos',
                'descripcion' => 'Programación orientada a objetos, estructuras de datos, lógica y resolución de problemas.',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'DevOps y Cloud Computing',
                'slug' => 'devops-y-cloud-computing',
                'descripcion' => 'Contenedores, CI/CD, servidores Linux, observabilidad y despliegue en la nube.',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Electrónica y Hardware',
                'slug' => 'electronica-y-hardware',
                'descripcion' => 'Circuitos eléctricos, lógica digital, microcontroladores y mantenimiento de equipos.',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Inteligencia Artificial y Ciencia de Datos',
                'slug' => 'inteligencia-artificial-y-ciencia-de-datos',
                'descripcion' => 'Análisis estadístico, machine learning, procesamiento de datos y modelos predictivos.',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Desarrollo Móvil y Escritorio',
                'slug' => 'desarrollo-movil-y-escritorio',
                'descripcion' => 'Aplicaciones multiplataforma, interfaces gráficas y consumo de APIs.',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Calidad de Software y Testing',
                'slug' => 'calidad-de-software-y-testing',
                'descripcion' => 'Pruebas unitarias, integración, automatización QA y control de versiones con Git.',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Productividad y Gestión de Proyectos',
                'slug' => 'productividad-y-gestion-de-proyectos',
                'descripcion' => 'Metodologías ágiles, documentación técnica, flujo de trabajo y gestión de entregas.',
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