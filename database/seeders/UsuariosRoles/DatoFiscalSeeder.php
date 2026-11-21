<?php

namespace Database\Seeders\UsuariosRoles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatoFiscalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $users = DB::table('users')->pluck('id', 'email');

        $datosFiscales = [
            [
                'nombre_razon_social' => 'Servicios Técnicos del Valle S. de R.L.',
                'rtn' => '05019999123456',
                'direccion' => 'Barrio Los Andes, 3ra calle, 5ta avenida, San Pedro Sula, Cortés',
                'correo' => 'facturacion@sistema.local',
                'telefono' => '+50425501122',
                'user_id' => $users['admin@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Valeria Alejandra Flores Reyes',
                'rtn' => '08011998654321',
                'direccion' => 'Colonia Palmira, bloque B, casa 14, Tegucigalpa, Francisco Morazán',
                'correo' => 'usuario@sistema.local',
                'telefono' => '+50422304455',
                'user_id' => $users['usuario@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('datos_fiscales')->upsert(
            $datosFiscales,
            ['user_id'],
            [
                'nombre_razon_social',
                'rtn',
                'direccion',
                'correo',
                'telefono',
                'updated_at',
            ]
        );
    }
}