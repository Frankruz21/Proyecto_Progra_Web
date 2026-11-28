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
            [
                'nombre' => 'Arquitectura de Bases de Datos y SQL',
                'descripcion' => 'Ruta para dominar normalización, integridad referencial, consultas complejas, índices y objetos de base de datos.',
                'imagen' => 'rutas/bases-de-datos-sql.jpg',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Fundamentos de Ciencias de la Computación',
                'descripcion' => 'Ruta centrada en lógica algorítmica, complejidad asintótica, estructuras de datos lineales, árboles y grafos.',
                'imagen' => 'rutas/ciencias-computacion.jpg',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'DevOps, Contenedores y Entrega Continua',
                'descripcion' => 'Ruta práctica sobre administración de servidores Linux, Docker, variables de entorno y pipelines CI/CD.',
                'imagen' => 'rutas/devops-cicd.jpg',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Ingeniería Eléctrica y Sistemas Digitales',
                'descripcion' => 'Ruta base en análisis de circuitos, álgebra booleana, mapas de Karnaugh y diseño lógico combinacional.',
                'imagen' => null,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Datos, Estadística y Machine Learning',
                'descripcion' => 'Ruta para preparar conjuntos de datos, aplicar probabilidad y evaluar modelos supervisados con rigor.',
                'imagen' => 'rutas/datos-machine-learning.jpg',
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Calidad de Software y Flujos Colaborativos',
                'descripcion' => 'Ruta enfocada en control de versiones con Git, ramas limpias, pruebas automatizadas y prevención de regresiones.',
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