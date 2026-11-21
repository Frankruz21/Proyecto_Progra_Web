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
        $instructorId = DB::table('perfil_instructores')->orderBy('id')->value('id');
        $categoriaId = DB::table('categorias')->where('slug', 'desarrollo-web')->value('id');
        $nivelId = DB::table('niveles')->where('nombre', 'Principiante')->value('id');
        $idiomaId = DB::table('idiomas')->where('codigo', 'es')->value('id');

        $cursos = [
            [
                'titulo' => 'Fundamentos de Laravel y APIs REST',
                'slug' => 'fundamentos-de-laravel-y-apis-rest',
                'descripcion_corta' => 'Aprende a construir backends estructurados con Laravel, migraciones, Eloquent y endpoints REST',
                'descripcion' => 'Curso practico enfocado en modelado relacional, migraciones, seeders, controladores, validación y diseño de APIs limpias en Laravel',
                'portada' => 'cursos/portadas/laravel-apis-rest.jpg',
                'video_intro_url' => 'https://example.com/videos/laravel-intro.mp4',
                'precio' => 45.00,
                'requisitos' => 'Conocimientos básicos de PHP y fundamentos de bases de datos relacionales',
                'objetivos' => 'Diseñar esquemas relacionales, automatizar datos de prueba y crear endpoints escalables',
                'duracion_horas' => 14.50,
                'es_programacion' => true,
                'es_destacado' => true,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorId,
                'categoria_id' => $categoriaId,
                'nivel_id' => $nivelId,
                'idioma_id' => $idiomaId,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titulo' => 'Redes Empresariales y Automatización con Python',
                'slug' => 'redes-empresariales-y-automatizacion-con-python',
                'descripcion_corta' => 'Configura enrutamiento, conmutación y scripts de automatizacin para redes corporativas.',
                'descripcion' => 'Aborda arquitecturas de red, protocolos de enrutamiento, segmentación y automatización de tareas operativas mediante scripts.',
                'portada' => 'cursos/portadas/redes-automatizacion.jpg',
                'video_intro_url' => null,
                'precio' => 60.00,
                'requisitos' => 'Conceptos básicos de direccionamiento IP, subredes y terminal.',
                'objetivos' => 'Diagnosticar topologias de red y automatizar consultas y configuraciones de dispositivos.',
                'duracion_horas' => 20.00,
                'es_programacion' => false,
                'es_destacado' => false,
                'fecha_publicacion' => $now,
                'instructor_id' => $instructorId,
                'categoria_id' => DB::table('categorias')->where('slug', 'redes-y-seguridad')->value('id') ?? $categoriaId,
                'nivel_id' => DB::table('niveles')->where('nombre', 'Intermedio')->value('id') ?? $nivelId,
                'idioma_id' => $idiomaId,
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