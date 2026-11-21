<?php

namespace Database\Seeders\UsuariosRoles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $roles = [
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Acceso total a la gestión del sistema, usuarios, roles y configuraciones.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Usuario',
                'descripcion' => 'Acceso estándar a las funciones operativas asignadas a su cuenta.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('roles')->upsert(
            $roles,
            ['nombre'],
            ['descripcion', 'updated_at'] 
        );
    }
}