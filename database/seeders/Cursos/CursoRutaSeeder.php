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

        $cursos = DB::table('cursos')->pluck('id', 'slug');
        $rutas = DB::table('rutas_aprendizaje')->pluck('id', 'nombre');

        if ($cursos->isEmpty() || $rutas->isEmpty()) {
            return;
        }

        $candidatos = [
            // Backend con PHP y Laravel
            [
                'curso_id' => $cursos['fundamentos-de-laravel-y-apis-rest'] ?? null,
                'ruta_id' => $rutas['Backend con PHP y Laravel'] ?? null,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['modelado-relacional-y-sql-avanzado'] ?? null,
                'ruta_id' => $rutas['Backend con PHP y Laravel'] ?? null,
                'orden' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['pruebas-automatizadas-y-git-en-flujos-de-equipo'] ?? null,
                'ruta_id' => $rutas['Backend con PHP y Laravel'] ?? null,
                'orden' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Infraestructura y Automatización de Redes
            [
                'curso_id' => $cursos['redes-empresariales-y-automatizacion-con-python'] ?? null,
                'ruta_id' => $rutas['Infraestructura y Automatización de Redes'] ?? null,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['docker-linux-y-pipelines-ci-cd'] ?? null,
                'ruta_id' => $rutas['Infraestructura y Automatización de Redes'] ?? null,
                'orden' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Arquitectura de Bases de Datos y SQL
            [
                'curso_id' => $cursos['modelado-relacional-y-sql-avanzado'] ?? null,
                'ruta_id' => $rutas['Arquitectura de Bases de Datos y SQL'] ?? null,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['fundamentos-de-laravel-y-apis-rest'] ?? null,
                'ruta_id' => $rutas['Arquitectura de Bases de Datos y SQL'] ?? null,
                'orden' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Fundamentos de Ciencias de la Computación
            [
                'curso_id' => $cursos['estructuras-de-datos-y-algoritmos'] ?? null,
                'ruta_id' => $rutas['Fundamentos de Ciencias de la Computación'] ?? null,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['probabilidad-y-fundamentos-de-machine-learning'] ?? null,
                'ruta_id' => $rutas['Fundamentos de Ciencias de la Computación'] ?? null,
                'orden' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // DevOps, Contenedores y Entrega Continua
            [
                'curso_id' => $cursos['docker-linux-y-pipelines-ci-cd'] ?? null,
                'ruta_id' => $rutas['DevOps, Contenedores y Entrega Continua'] ?? null,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['pruebas-automatizadas-y-git-en-flujos-de-equipo'] ?? null,
                'ruta_id' => $rutas['DevOps, Contenedores y Entrega Continua'] ?? null,
                'orden' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Ingeniería Eléctrica y Sistemas Digitales
            [
                'curso_id' => $cursos['circuitos-electricos-y-logica-digital'] ?? null,
                'ruta_id' => $rutas['Ingeniería Eléctrica y Sistemas Digitales'] ?? null,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Datos, Estadística y Machine Learning
            [
                'curso_id' => $cursos['probabilidad-y-fundamentos-de-machine-learning'] ?? null,
                'ruta_id' => $rutas['Datos, Estadística y Machine Learning'] ?? null,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['estructuras-de-datos-y-algoritmos'] ?? null,
                'ruta_id' => $rutas['Datos, Estadística y Machine Learning'] ?? null,
                'orden' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Calidad de Software y Flujos Colaborativos
            [
                'curso_id' => $cursos['pruebas-automatizadas-y-git-en-flujos-de-equipo'] ?? null,
                'ruta_id' => $rutas['Calidad de Software y Flujos Colaborativos'] ?? null,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'curso_id' => $cursos['fundamentos-de-laravel-y-apis-rest'] ?? null,
                'ruta_id' => $rutas['Calidad de Software y Flujos Colaborativos'] ?? null,
                'orden' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        $cursosRutas = [];
        foreach ($candidatos as $item) {
            if (! empty($item['curso_id']) && ! empty($item['ruta_id'])) {
                $clave = $item['curso_id'].'-'.$item['ruta_id'];
                $cursosRutas[$clave] = $item;
            }
        }

        if ($cursosRutas === []) {
            return;
        }

        DB::table('cursos__rutas')->upsert(
            array_values($cursosRutas),
            ['curso_id', 'ruta_id'],
            [
                'orden',
                'updated_at',
            ]
        );
    }
}