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

        $modulos = DB::table('modulos')->pluck('id', 'titulo');

        if ($modulos->isEmpty()) {
            return;
        }

        $candidatos = [
            // Módulo 1 - Laravel
            [
                'modulo_id' => $modulos['Arquitectura, Migraciones y Seeders'] ?? null,
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
                'modulo_id' => $modulos['Arquitectura, Migraciones y Seeders'] ?? null,
                'titulo' => 'Restricciones de integridad y seeders idempotentes',
                'tipo' => 'lectura',
                'url_contenido' => null,
                'contenido' => 'Aprende a diseñar llaves foráneas, índices únicos y seeders repetibles con upsert() sin duplicar datos.',
                'duracion_min' => 14,
                'orden' => 2,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $modulos['Arquitectura, Migraciones y Seeders'] ?? null,
                'titulo' => 'Orden de ejecución y depuración de lotes iniciales',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/laravel-seeders-orden.mp4',
                'contenido' => null,
                'duracion_min' => 16,
                'orden' => 3,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Módulo 2 - Laravel
            [
                'modulo_id' => $modulos['Modelos Eloquent, Relaciones y Validación'] ?? null,
                'titulo' => 'Relaciones uno a muchos y muchos a muchos en Eloquent',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/eloquent-relaciones.mp4',
                'contenido' => null,
                'duracion_min' => 22,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $modulos['Modelos Eloquent, Relaciones y Validación'] ?? null,
                'titulo' => 'Validación de entradas y reglas de negocio',
                'tipo' => 'lectura',
                'url_contenido' => null,
                'contenido' => 'Separa la validación de formato de las reglas de dominio para mantener controladores limpios y predecibles.',
                'duracion_min' => 15,
                'orden' => 2,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Módulo 3 - Laravel
            [
                'modulo_id' => $modulos['Endpoints REST, Autenticación y Buenas Prácticas'] ?? null,
                'titulo' => 'Diseño de recursos REST y códigos de estado HTTP',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/rest-endpoints-http.mp4',
                'contenido' => null,
                'duracion_min' => 20,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Módulo 1 - Redes
            [
                'modulo_id' => $modulos['Fundamentos de Enrutamiento y Conmutación'] ?? null,
                'titulo' => 'Tablas de enrutamiento y pruebas de conectividad',
                'tipo' => 'lectura',
                'url_contenido' => null,
                'contenido' => 'Revisa cómo se evalúan los prefijos más específicos y valida la conectividad entre subredes.',
                'duracion_min' => 12,
                'orden' => 1,
                'es_preview' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $modulos['Fundamentos de Enrutamiento y Conmutación'] ?? null,
                'titulo' => 'VLANs, enlaces troncales y segmentación de tráfico',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/vlans-troncales.mp4',
                'contenido' => null,
                'duracion_min' => 24,
                'orden' => 2,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Módulo 2 - Redes
            [
                'modulo_id' => $modulos['Scripts con Python para Inspección y Configuración'] ?? null,
                'titulo' => 'Automatización de consultas y respaldos con Python',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/python-redes-respaldos.mp4',
                'contenido' => null,
                'duracion_min' => 25,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // SQL Avanzado
            [
                'modulo_id' => $modulos['Normalización, Claves e Integridad Referencial'] ?? null,
                'titulo' => 'De la primera a la tercera forma normal sin redundancia',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/sql-normalizacion.mp4',
                'contenido' => null,
                'duracion_min' => 19,
                'orden' => 1,
                'es_preview' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $modulos['Consultas Complejas, Índices y Objetos en BD'] ?? null,
                'titulo' => 'Índices compuestos, joins y análisis de consultas',
                'tipo' => 'lectura',
                'url_contenido' => null,
                'contenido' => 'Observa cómo el orden de las columnas en un índice afecta filtrados, ordenamientos y unicidad.',
                'duracion_min' => 16,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Estructuras de Datos y Algoritmos
            [
                'modulo_id' => $modulos['Análisis de Complejidad y Estructuras Lineales'] ?? null,
                'titulo' => 'Complejidad temporal y espacial con notación Big O',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/big-o-lineales.mp4',
                'contenido' => null,
                'duracion_min' => 21,
                'orden' => 1,
                'es_preview' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $modulos['Árboles, Grafos y Algoritmos de Recorrido'] ?? null,
                'titulo' => 'Recorridos BFS y DFS sobre grafos dirigidos y no dirigidos',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/grafos-bfs-dfs.mp4',
                'contenido' => null,
                'duracion_min' => 23,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Docker, Linux y Pipelines CI/CD
            [
                'modulo_id' => $modulos['Administración Esencial en Linux y Contenedores'] ?? null,
                'titulo' => 'Imágenes, contenedores, volúmenes y variables de entorno',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/docker-imagenes-volumenes.mp4',
                'contenido' => null,
                'duracion_min' => 20,
                'orden' => 1,
                'es_preview' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $modulos['Automatización con CI/CD y Despliegue Seguro'] ?? null,
                'titulo' => 'Etapas de prueba y despliegue continuo en pipelines',
                'tipo' => 'lectura',
                'url_contenido' => null,
                'contenido' => 'Define pasos deterministas para instalar dependencias, ejecutar pruebas y detectar fallos antes de liberar.',
                'duracion_min' => 14,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Circuitos Eléctricos y Lógica Digital
            [
                'modulo_id' => $modulos['Leyes de Circuitos y Análisis de Corriente Directa'] ?? null,
                'titulo' => 'Ley de Ohm, series, paralelos y leyes de Kirchhoff',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/ohm-kirchhoff.mp4',
                'contenido' => null,
                'duracion_min' => 17,
                'orden' => 1,
                'es_preview' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $modulos['Álgebra Booleana, Mapas de Karnaugh y Combinacional'] ?? null,
                'titulo' => 'Simplificación con mapas de Karnaugh y multiplexores',
                'tipo' => 'lectura',
                'url_contenido' => null,
                'contenido' => 'Agrupa minitérminos adyacentes para reducir compuertas y comprende la selección de entradas en multiplexores.',
                'duracion_min' => 15,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Probabilidad y Fundamentos de Machine Learning
            [
                'modulo_id' => $modulos['Distribuciones, Muestreo y Preparación de Datos'] ?? null,
                'titulo' => 'Limpieza de datos y división train/test sin fuga',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/ml-preparacion-datos.mp4',
                'contenido' => null,
                'duracion_min' => 19,
                'orden' => 1,
                'es_preview' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $modulos['Modelos Supervisados y Métricas de Evaluación'] ?? null,
                'titulo' => 'Precisión, recall, matriz de confusión y sobreajuste',
                'tipo' => 'lectura',
                'url_contenido' => null,
                'contenido' => 'Interpreta métricas más allá del accuracy cuando las clases están desbalanceadas.',
                'duracion_min' => 16,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Pruebas Automatizadas y Git en Flujos de Equipo
            [
                'modulo_id' => $modulos['Estrategias de Ramas y Trabajo Colaborativo en Git'] ?? null,
                'titulo' => 'Ramas de trabajo, commits claros y resolución de conflictos',
                'tipo' => 'video',
                'url_contenido' => 'https://example.com/lecciones/git-ramas-conflictos.mp4',
                'contenido' => null,
                'duracion_min' => 15,
                'orden' => 1,
                'es_preview' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'modulo_id' => $modulos['Pruebas Unitarias y de Integración Reproducibles'] ?? null,
                'titulo' => 'Diseño de casos de prueba y aislamiento de dependencias',
                'tipo' => 'lectura',
                'url_contenido' => null,
                'contenido' => 'Verifica caminos felices y casos límite con datos de prueba controlados y repetibles.',
                'duracion_min' => 13,
                'orden' => 1,
                'es_preview' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        $lecciones = [];
        foreach ($candidatos as $leccion) {
            if (! empty($leccion['modulo_id'])) {
                $clave = $leccion['modulo_id'].'-'.$leccion['orden'];
                $lecciones[$clave] = $leccion;
            }
        }

        if ($lecciones === []) {
            return;
        }

        DB::table('lecciones')->upsert(
            array_values($lecciones),
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