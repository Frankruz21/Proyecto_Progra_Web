<?php

namespace Database\Seeders\UsuariosRoles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = DB::table('roles')->pluck('id', 'nombre');

        $now = now();
        $password = Hash::make('Admin1234*');

        $users = [
            [
                'primer_nombre' => 'Carlos',
                'segundo_nombre' => 'Alberto',
                'primer_apellido' => 'Mendoza',
                'segundo_apellido' => 'Cruz',
                'email' => 'admin@sistema.local',
                'email_verified_at' => $now,
                'password' => $password,
                'telefono' => '+50498112233',
                'fotografia' => null,
                'activo' => true,
                'rol_id' => $roles['Administrador'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'primer_nombre' => 'Valeria',
                'segundo_nombre' => null,
                'primer_apellido' => 'Flores',
                'segundo_apellido' => 'Reyes',
                'email' => 'usuario@sistema.local',
                'email_verified_at' => $now,
                'password' => Hash::make('Usuario1234*'),
                'telefono' => '+50499445566',
                'fotografia' => null,
                'activo' => true,
                'rol_id' => $roles['Usuario'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('users')->upsert(
            $users,
            ['email'],
            [
                'primer_nombre',
                'segundo_nombre',
                'primer_apellido',
                'segundo_apellido',
                'email_verified_at',
                'password',
                'telefono',
                'fotografia',
                'activo',
                'rol_id',
                'updated_at',
            ]
        );
    }
}