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

        $userIds = DB::table('users')
            ->whereIn('email', [
                'admin@sistema.local',
                'marcela.aguilar@sistema.local',
                'gabriela.portillo@sistema.local',
                'fernando.alvarado@sistema.local',
                'paola.suazo@sistema.local',
            ])
            ->pluck('id', 'email');

        $solicitudes = [
            [
                'primer_nombre' => 'Gabriela',
                'segundo_nombre' => 'Nicole',
                'primer_apellido' => 'Portillo',
                'segundo_apellido' => 'Cálix',
                'email' => 'gabriela.portillo@sistema.local',
                'email_verified_at' => $now,
                'especialidad' => 'Desarrollo Web con Laravel y APIs',
                'biografia' => 'Desarrolladora backend enfocada en arquitectura limpia, pruebas automatizadas y diseño de APIs REST en Laravel.',
                'telefono' => '+50498890128',
                'curriculum' => 'curriculums/gabriela-portillo-cv.pdf',
                'estado' => 'aprobada',
                'fecha_revision' => $now->copy()->subDays(3),
                'revisado_por' => $userIds['admin@sistema.local'] ?? null,
                'user_id' => $userIds['gabriela.portillo@sistema.local'],
                'observaciones' => 'Perfil sólido con experiencia práctica verificable para impartir módulos de backend.',
                'created_at' => $now->copy()->subDays(5),
                'updated_at' => $now->copy()->subDays(3),
            ],
            [
                'primer_nombre' => 'Fernando',
                'segundo_nombre' => 'José',
                'primer_apellido' => 'Alvarado',
                'segundo_apellido' => 'Gómez',
                'email' => 'fernando.alvarado@sistema.local',
                'email_verified_at' => $now,
                'especialidad' => 'Redes y Automatización con Python',
                'biografia' => 'Ingeniero enfocado en enrutamiento IP, segmentación de redes y scripts de automatización con Python.',
                'telefono' => '+50497901239',
                'curriculum' => 'curriculums/fernando-alvarado-cv.pdf',
                'estado' => 'pendiente',
                'fecha_revision' => null,
                'revisado_por' => null,
                'user_id' => $userIds['fernando.alvarado@sistema.local'],
                'observaciones' => null,
                'created_at' => $now->copy()->subDay(),
                'updated_at' => $now->copy()->subDay(),
            ],
            [
                'primer_nombre' => 'Paola',
                'segundo_nombre' => 'Andrea',
                'primer_apellido' => 'Suazo',
                'segundo_apellido' => 'Bueso',
                'email' => 'paola.suazo@sistema.local',
                'email_verified_at' => $now,
                'especialidad' => 'Bases de Datos Relacionales y SQL',
                'biografia' => 'Especialista en modelado relacional, optimización de consultas y procedimientos almacenados.',
                'telefono' => '+50496012340',
                'curriculum' => 'curriculums/paola-suazo-cv.pdf',
                'estado' => 'rechazada',
                'fecha_revision' => $now->copy()->subDays(2),
                'revisado_por' => $userIds['marcela.aguilar@sistema.local'] ?? null,
                'user_id' => $userIds['paola.suazo@sistema.local'],
                'observaciones' => 'Se solicita incluir constancias de experiencia docente antes de reenviar la postulación.',
                'created_at' => $now->copy()->subDays(4),
                'updated_at' => $now->copy()->subDays(2),
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
                'user_id',
                'observaciones',
                'updated_at',
            ]
        );
    }
}