<?php

namespace Database\Seeders\UsuariosRoles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudInstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $revisorId = DB::table('users')->orderBy('id')->value('id');

        $solicitudes = [
            [
                'primer_nombre' => 'Diego',
                'segundo_nombre' => 'Alejandro',
                'primer_apellido' => 'Mejia',
                'segundo_apellido' => 'Pineda',
                'email' => 'diego.mejia@sistema.local',
                'email_verified_at' => $now,
                'especialidad' => 'Redes y Seguridad',
                'biografia' => 'Ingeniero con experiencia en routing, switching y automatización de redes.',
                'telefono' => '+50497112233',
                'curriculum' => 'curriculums/diego_mejia_cv.pdf',
                'estado' => 'pendiente',
                'fecha_revision' => null,
                'revisado_por' => null,
                'observaciones' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'primer_nombre' => 'Elena',
                'segundo_nombre' => null,
                'primer_apellido' => 'Castillo',
                'segundo_apellido' => 'Ramirez',
                'email' => 'elena.castillo@sistema.local',
                'email_verified_at' => $now,
                'especialidad' => 'Desarrollo Web Backend',
                'biografia' => 'Desarrolladora backend enfocada en APIs, bases de datos y buenas prácticas.',
                'telefono' => '+50496554433',
                'curriculum' => 'curriculums/elena_castillo_cv.pdf',
                'estado' => 'aprobada',
                'fecha_revision' => $now,
                'revisado_por' => $revisorId,
                'observaciones' => 'Perfil validado para impartir cursos del módulo.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('solicitud_instructores')->upsert(
            $solicitudes,
            ['email'],
            [
                'primer_nombre',
                'segundo_nombre',
                'primer_apellido',
                'segundo_apellido',
                'email_verified_at',
                'especialidad',
                'biografia',
                'telefono',
                'curriculum',
                'estado',
                'fecha_revision',
                'revisado_por',
                'observaciones',
                'updated_at',
            ]
        );
    }
}