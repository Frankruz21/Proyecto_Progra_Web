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

        $cursos = DB::table('cursos')->pluck('id', 'slug');

        if ($cursos->isEmpty()) {
            return;
        }

        $candidatos = [
            // Fundamentos de Laravel y APIs REST
            [
                'curso_id' => $cursos['fundamentos-de-laravel-y-apis-rest'] ?? null,
                'titulo' => 'Arquitectura, Migraciones y Seeders',
                'descripcion' => 'Estructura del proyecto, definición de tablas y automatización de datos iniciales.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['fundamentos-de-laravel-y-apis-rest'] ?? null,
                'titulo' => 'Modelos Eloquent, Relaciones y Validación',
                'descripcion' => 'Relaciones entre entidades, reglas de validación, Form Requests y respuestas consistentes.',
                'orden' => 2,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['fundamentos-de-laravel-y-apis-rest'] ?? null,
                'titulo' => 'Endpoints REST, Autenticación y Buenas Prácticas',
                'descripcion' => 'Diseño de rutas, códigos HTTP, manejo de errores y organización de servicios.',
                'orden' => 3,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Redes Empresariales y Automatización con Python
            [
                'curso_id' => $cursos['redes-empresariales-y-automatizacion-con-python'] ?? null,
                'titulo' => 'Fundamentos de Enrutamiento y Conmutación',
                'descripcion' => 'Segmentación, tablas de enrutamiento y diagnóstico básico de conectividad.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['redes-empresariales-y-automatizacion-con-python'] ?? null,
                'titulo' => 'Scripts con Python para Inspección y Configuración',
                'descripcion' => 'Automatización de respaldos, parseo de salidas y verificación de estados de red.',
                'orden' => 2,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Modelado Relacional y SQL Avanzado
            [
                'curso_id' => $cursos['modelado-relacional-y-sql-avanzado'] ?? null,
                'titulo' => 'Normalización, Claves e Integridad Referencial',
                'descripcion' => 'Diseño de esquemas 1FN-3FN, restricciones únicas, llaves foráneas y reglas de borrado.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['modelado-relacional-y-sql-avanzado'] ?? null,
                'titulo' => 'Consultas Complejas, Índices y Objetos en BD',
                'descripcion' => 'Joins, agregaciones, vistas, procedimientos almacenados y análisis de rendimiento.',
                'orden' => 2,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Estructuras de Datos y Algoritmos
            [
                'curso_id' => $cursos['estructuras-de-datos-y-algoritmos'] ?? null,
                'titulo' => 'Análisis de Complejidad y Estructuras Lineales',
                'descripcion' => 'Notación asintótica, arreglos, listas enlazadas, pilas y colas aplicadas.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['estructuras-de-datos-y-algoritmos'] ?? null,
                'titulo' => 'Árboles, Grafos y Algoritmos de Recorrido',
                'descripcion' => 'Árboles binarios, recorridos en profundidad y anchura, caminos mínimos y búsqueda.',
                'orden' => 2,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Docker, Linux y Pipelines CI/CD
            [
                'curso_id' => $cursos['docker-linux-y-pipelines-ci-cd'] ?? null,
                'titulo' => 'Administración Esencial en Linux y Contenedores',
                'descripcion' => 'Permisos, servicios, imágenes, volúmenes y redes locales en Docker.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['docker-linux-y-pipelines-ci-cd'] ?? null,
                'titulo' => 'Automatización con CI/CD y Despliegue Seguro',
                'descripcion' => 'Ejecución automatizada de pruebas, variables de entorno y pasos de despliegue.',
                'orden' => 2,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Circuitos Eléctricos y Lógica Digital
            [
                'curso_id' => $cursos['circuitos-electricos-y-logica-digital'] ?? null,
                'titulo' => 'Leyes de Circuitos y Análisis de Corriente Directa',
                'descripcion' => 'Ley de Ohm, leyes de Kirchhoff, divisores de tensión/corriente y potencia.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['circuitos-electricos-y-logica-digital'] ?? null,
                'titulo' => 'Álgebra Booleana, Mapas de Karnaugh y Combinacional',
                'descripcion' => 'Simplificación de funciones lógicas, compuertas, multiplexores y decodificadores.',
                'orden' => 2,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Probabilidad y Fundamentos de Machine Learning
            [
                'curso_id' => $cursos['probabilidad-y-fundamentos-de-machine-learning'] ?? null,
                'titulo' => 'Distribuciones, Muestreo y Preparación de Datos',
                'descripcion' => 'Variables aleatorias, limpieza de datos, codificación y partición train/test.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['probabilidad-y-fundamentos-de-machine-learning'] ?? null,
                'titulo' => 'Modelos Supervisados y Métricas de Evaluación',
                'descripcion' => 'Regresión y clasificación, matrices de confusión, sobreajuste y validación.',
                'orden' => 2,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Pruebas Automatizadas y Git en Flujos de Equipo
            [
                'curso_id' => $cursos['pruebas-automatizadas-y-git-en-flujos-de-equipo'] ?? null,
                'titulo' => 'Estrategias de Ramas y Trabajo Colaborativo en Git',
                'descripcion' => 'Commits atómicos, pull requests, resolución de conflictos y revisión de cambios.',
                'orden' => 1,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['pruebas-automatizadas-y-git-en-flujos-de-equipo'] ?? null,
                'titulo' => 'Pruebas Unitarias y de Integración Reproducibles',
                'descripcion' => 'Aislamiento de dependencias, casos límite y prevención de regresiones.',
                'orden' => 2,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        $modulos = [];
        foreach ($candidatos as $modulo) {
            if (! empty($modulo['curso_id'])) {
                $clave = $modulo['curso_id'].'-'.$modulo['orden'];
                $modulos[$clave] = $modulo;
            }
        }

        if ($modulos === []) {
            return;
        }

        DB::table('modulos')->upsert(
            array_values($modulos),
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