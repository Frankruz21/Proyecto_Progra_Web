<?php

namespace Database\Seeders\UsuariosRoles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvitacionInstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $solicitudes = DB::table('solicitud_instructores')->pluck('id', 'email');

        $invitaciones = [
            [
                'token_hash' => hash('sha256', 'token-invitacion-diego-001'),
                'expira_en' => $now->copy()->addDays(7),
                'usado_en' => null,
                'solicitud_id' => $solicitudes['diego.mejia@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'token_hash' => hash('sha256', 'token-invitacion-elena-002'),
                'expira_en' => $now->copy()->addDays(7),
                'usado_en' => $now,
                'solicitud_id' => $solicitudes['elena.castillo@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('invitacion_instructores')->upsert(
            $invitaciones,
            ['token_hash'],
            [
                'expira_en',
                'usado_en',
                'solicitud_id',
                'updated_at',
            ]
        );
    }
}