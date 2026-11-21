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
                'biografia' => 'Especialista en infraestructura de redes, routing/switching, seguridad y automatización.',
                'especialidad' => 'Redes y Seguridad',
                'fotografia' => null,
                'linkedin' => 'https://www.linkedin.com/in/carlos-mendoza-dev',
                'fecha_aprobacion' => $now,
                'user_id' => $users['admin@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'biografia' => 'Desarrolladora enfocado en arquitectura backend, APIs REST y modelado de bases de datos.',
                'especialidad' => 'Desarrollo Web Backend',
                'fotografia' => null,
                'linkedin' => 'https://www.linkedin.com/in/valeria-flores-dev',
                'fecha_aprobacion' => $now,
                'user_id' => $users['usuario@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
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