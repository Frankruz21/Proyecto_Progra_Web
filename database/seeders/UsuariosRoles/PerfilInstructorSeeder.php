<?php

namespace Database\Seeders\UsuariosRoles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilInstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        $now = now();
        $users = DB::table('users')->pluck('id', 'email');

        $perfiles = [
            [
                'biografia' => 'Especialista en diseño de redes empresariales, segmentación IP, VLANs y diagnóstico de conectividad.',
                'especialidad' => 'Redes y Conmutación',
                'fotografia' => null,
                'linkedin' => 'https://www.linkedin.com/in/diana-lagos-dev',
                'fecha_aprobacion' => $now->copy()->subDays(10),
                'user_id' => $users['diana.lagos@sistema.local'],
                'created_at' => $now->copy()->subDays(12),
                'updated_at' => $now->copy()->subDays(10),
            ],
            [
                'biografia' => 'Desarrollador backend enfocado en Laravel, diseño de APIs REST, migraciones y pruebas automatizadas.',
                'especialidad' => 'Desarrollo Web con Laravel',
                'fotografia' => null,
                'linkedin' => 'https://www.linkedin.com/in/roberto-paz-dev',
                'fecha_aprobacion' => $now->copy()->subDays(8),
                'user_id' => $users['roberto.paz@sistema.local'],
                'created_at' => $now->copy()->subDays(9),
                'updated_at' => $now->copy()->subDays(8),
            ],
            [
                'biografia' => 'Instructora en modelado relacional, diseño EER, SQL avanzado, procedimientos almacenados y triggers.',
                'especialidad' => 'Bases de Datos y SQL',
                'fotografia' => null,
                'linkedin' => 'https://www.linkedin.com/in/sofia-ramos-dev',
                'fecha_aprobacion' => $now->copy()->subDays(6),
                'user_id' => $users['sofia.ramos@sistema.local'],
                'created_at' => $now->copy()->subDays(7),
                'updated_at' => $now->copy()->subDays(6),
            ],
            [
                'biografia' => 'Enfocado en lógica computacional, autómatas, expresiones regulares y análisis de rendimiento de sistemas.',
                'especialidad' => 'Fundamentos y Teoría de la Computación',
                'fotografia' => null,
                'linkedin' => 'https://www.linkedin.com/in/daniel-mejia-dev',
                'fecha_aprobacion' => $now->copy()->subDays(4),
                'user_id' => $users['daniel.mejia@sistema.local'],
                'created_at' => $now->copy()->subDays(5),
                'updated_at' => $now->copy()->subDays(4),
            ],
            [
                'biografia' => 'Instructor en automatización de infraestructura con Python, scripting y buenas prácticas de despliegue.',
                'especialidad' => 'Automatización y Scripting con Python',
                'fotografia' => null,
                'linkedin' => 'https://www.linkedin.com/in/mario-salgado-dev',
                'fecha_aprobacion' => $now->copy()->subDays(2),
                'user_id' => $users['mario.salgado@sistema.local'],
                'created_at' => $now->copy()->subDays(3),
                'updated_at' => $now->copy()->subDays(2),
            ],
        ];

        DB::table('perfil_instructores')->upsert(
            $perfiles,
            ['user_id'],
            [
                'biografia',
                'especialidad',
                'fotografia',
                'linkedin',
                'fecha_aprobacion',
                'updated_at',
            ]
        );
    }
}