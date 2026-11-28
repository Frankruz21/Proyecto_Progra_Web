<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $instructoresIds = DB::table('perfil_instructores')
            ->orderBy('id')
            ->pluck('id')
            ->values();

        if ($instructoresIds->isEmpty()) {
            return;
        }

        $instructorDefault = $instructoresIds->first();
        $instructorSecundario = $instructoresIds->get(1) ?? $instructorDefault;

        $categorias = DB::table('categorias')->pluck('id', 'slug');
        $niveles = DB::table('niveles')->pluck('id', 'nombre');
        $idiomas = DB::table('idiomas')->pluck('id', 'codigo');

        $categoriaDefault = $categorias['desarrollo-web'] ?? $categorias->first();
        $nivelDefault = $niveles['Principiante'] ?? $niveles->first();
        $idiomaDefault = $idiomas['es'] ?? $idiomas->first();

        if (! $categoriaDefault || ! $nivelDefault || ! $idiomaDefault) {
            return;
        }

        $cursos = [
            [
                'titulo' => 'Fundamentos de Laravel y APIs REST',
                'slug' => 'fundamentos-de-laravel-y-apis-rest',
                'descripcion_corta' => 'Aprende a construir backends estructurados con Laravel, migraciones, Eloquent y endpoints REST',
                'descripcion' => 'Curso práctico enfocado en modelado relacional, migraciones, seeders, controladores, validación y diseño de APIs limpias en Laravel',
                'portada' => 'cursos/portadas/laravel-apis-rest.jpg',
                'video_intro_url' => 'https://example.com/videos/laravel-intro.mp4',
                'precio' => 45.00,
                'requisitos' => 'Conocimientos básicos de PHP y fundamentos de bases de datos relacionales',
                'objetivos' => 'Diseñar esquemas relacionales, automatizar datos de prueba y crear endpoints escalables',
                'duracion_horas' => 14.50,
                'es_programacion' => true,
                'es_destacado' => true,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorDefault,
                'categoria_id' => $categorias['desarrollo-web'] ?? $categoriaDefault,
                'nivel_id' => $niveles['Principiante'] ?? $nivelDefault,
                'idioma_id' => $idiomas['es'] ?? $idiomaDefault,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Redes Empresariales y Automatización con Python',
                'slug' => 'redes-empresariales-y-automatizacion-con-python',
                'descripcion_corta' => 'Configura enrutamiento, conmutación y scripts de automatización para redes corporativas.',
                'descripcion' => 'Aborda arquitecturas de red, protocolos de enrutamiento, segmentación y automatización de tareas operativas mediante scripts.',
                'portada' => 'cursos/portadas/redes-automatizacion.jpg',
                'video_intro_url' => null,
                'precio' => 60.00,
                'requisitos' => 'Conceptos básicos de direccionamiento IP, subredes y terminal.',
                'objetivos' => 'Diagnosticar topologías de red y automatizar consultas y configuraciones de dispositivos.',
                'duracion_horas' => 20.00,
                'es_programacion' => true,
                'es_destacado' => false,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorSecundario,
                'categoria_id' => $categorias['redes-y-seguridad'] ?? $categoriaDefault,
                'nivel_id' => $niveles['Intermedio'] ?? $nivelDefault,
                'idioma_id' => $idiomas['es'] ?? $idiomaDefault,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Modelado Relacional y SQL Avanzado',
                'slug' => 'modelado-relacional-y-sql-avanzado',
                'descripcion_corta' => 'Domina esquemas normalizados, índices, vistas, procedimientos y optimización de consultas.',
                'descripcion' => 'Aprende a diseñar bases de datos sólidas, prevenir anomalías, aplicar restricciones de integridad y analizar planes de ejecución.',
                'portada' => 'cursos/portadas/sql-avanzado.jpg',
                'video_intro_url' => 'https://example.com/videos/sql-intro.mp4',
                'precio' => 50.00,
                'requisitos' => 'Manejo básico de tablas y consultas SELECT simples.',
                'objetivos' => 'Construir modelos entidad-relación precisos y escribir consultas SQL eficientes y seguras.',
                'duracion_horas' => 16.00,
                'es_programacion' => true,
                'es_destacado' => true,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorDefault,
                'categoria_id' => $categorias['bases-de-datos-e-ingenieria-de-datos'] ?? $categoriaDefault,
                'nivel_id' => $niveles['Intermedio'] ?? $nivelDefault,
                'idioma_id' => $idiomas['es'] ?? $idiomaDefault,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Estructuras de Datos y Algoritmos',
                'slug' => 'estructuras-de-datos-y-algoritmos',
                'descripcion_corta' => 'Analiza complejidad temporal, árboles, grafos, colas, pilas y técnicas de búsqueda.',
                'descripcion' => 'Fortalece tu base algorítmica resolviendo problemas clásicos de ordenamiento, recursión, recorridos y optimización.',
                'portada' => 'cursos/portadas/estructuras-algoritmos.jpg',
                'video_intro_url' => null,
                'precio' => 55.00,
                'requisitos' => 'Sintaxis básica de algún lenguaje de programación (variables, ciclos, funciones).',
                'objetivos' => 'Elegir la estructura adecuada para cada problema y evaluar su rendimiento.',
                'duracion_horas' => 22.50,
                'es_programacion' => true,
                'es_destacado' => false,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorSecundario,
                'categoria_id' => $categorias['programacion-y-algoritmos'] ?? $categoriaDefault,
                'nivel_id' => $niveles['Intermedio'] ?? $nivelDefault,
                'idioma_id' => $idiomas['en'] ?? $idiomaDefault,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Docker, Linux y Pipelines CI/CD',
                'slug' => 'docker-linux-y-pipelines-ci-cd',
                'descripcion_corta' => 'Contenedoriza aplicaciones, administra servidores Linux y automatiza despliegues.',
                'descripcion' => 'Practica administración de servicios en Linux, imágenes y redes Docker, variables de entorno y flujos de integración continua.',
                'portada' => 'cursos/portadas/docker-cicd.jpg',
                'video_intro_url' => 'https://example.com/videos/devops-intro.mp4',
                'precio' => 65.00,
                'requisitos' => 'Uso de consola y nociones básicas de aplicaciones web.',
                'objetivos' => 'Empaquetar servicios reproducibles y automatizar pruebas y despliegues sin fricción.',
                'duracion_horas' => 18.00,
                'es_programacion' => true,
                'es_destacado' => true,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorDefault,
                'categoria_id' => $categorias['devops-y-cloud-computing'] ?? $categoriaDefault,
                'nivel_id' => $niveles['Avanzado'] ?? $nivelDefault,
                'idioma_id' => $idiomas['es'] ?? $idiomaDefault,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Circuitos Eléctricos y Lógica Digital',
                'slug' => 'circuitos-electricos-y-logica-digital',
                'descripcion_corta' => 'Comprende leyes de circuitos, álgebra booleana, mapas de Karnaugh y sistemas combinacionales.',
                'descripcion' => 'Curso aplicado a fundamentos eléctricos, análisis de mallas y nodos, compuertas lógicas, multiplexores y diseño digital.',
                'portada' => 'cursos/portadas/circuitos-logica-digital.jpg',
                'video_intro_url' => null,
                'precio' => 40.00,
                'requisitos' => 'Álgebra básica y nociones introductorias de física.',
                'objetivos' => 'Resolver circuitos fundamentales y simplificar funciones lógicas para diseño digital.',
                'duracion_horas' => 15.00,
                'es_programacion' => false,
                'es_destacado' => false,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorSecundario,
                'categoria_id' => $categorias['electronica-y-hardware'] ?? $categoriaDefault,
                'nivel_id' => $niveles['Principiante'] ?? $nivelDefault,
                'idioma_id' => $idiomas['es'] ?? $idiomaDefault,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Probabilidad y Fundamentos de Machine Learning',
                'slug' => 'probabilidad-y-fundamentos-de-machine-learning',
                'descripcion_corta' => 'Aplica distribuciones, métricas de evaluación y modelos supervisados sobre conjuntos de datos.',
                'descripcion' => 'Conecta estadística aplicada con preprocesamiento, regresión, clasificación, validación cruzada e interpretación de modelos.',
                'portada' => 'cursos/portadas/probabilidad-ml.jpg',
                'video_intro_url' => null,
                'precio' => 70.00,
                'requisitos' => 'Estadística descriptiva básica y manejo elemental de scripts.',
                'objetivos' => 'Preparar datos, entrenar modelos baseline y medir su generalización sin fuga de información.',
                'duracion_horas' => 24.00,
                'es_programacion' => true,
                'es_destacado' => false,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorDefault,
                'categoria_id' => $categorias['inteligencia-artificial-y-ciencia-de-datos'] ?? $categoriaDefault,
                'nivel_id' => $niveles['Intermedio'] ?? $nivelDefault,
                'idioma_id' => $idiomas['en'] ?? $idiomaDefault,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Pruebas Automatizadas y Git en Flujos de Equipo',
                'slug' => 'pruebas-automatizadas-y-git-en-flujos-de-equipo',
                'descripcion_corta' => 'Implementa pruebas unitarias y de integración, ramas limpias y revisiones de código.',
                'descripcion' => 'Mejora la confiabilidad de tus proyectos con casos de prueba reproducibles, aislamiento de dependencias y estrategias de Git.',
                'portada' => 'cursos/portadas/testing-git.jpg',
                'video_intro_url' => null,
                'precio' => 35.00,
                'requisitos' => 'Experiencia básica creando proyectos y usando repositorios Git.',
                'objetivos' => 'Detectar regresiones temprano y mantener un historial de cambios claro y trazable.',
                'duracion_horas' => 12.00,
                'es_programacion' => true,
                'es_destacado' => false,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorSecundario,
                'categoria_id' => $categorias['calidad-de-software-y-testing'] ?? $categoriaDefault,
                'nivel_id' => $niveles['Principiante'] ?? $nivelDefault,
                'idioma_id' => $idiomas['es'] ?? $idiomaDefault,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('cursos')->upsert(
            $cursos,
            ['slug'],
            [
                'titulo',
                'descripcion_corta',
                'descripcion',
                'portada',
                'video_intro_url',
                'precio',
                'requisitos',
                'objetivos',
                'duracion_horas',
                'es_programacion',
                'es_destacado',
                'fecha_publicacion',
                'instructor_id',
                'categoria_id',
                'nivel_id',
                'idioma_id',
                'updated_at',
            ]
        );
    }
}