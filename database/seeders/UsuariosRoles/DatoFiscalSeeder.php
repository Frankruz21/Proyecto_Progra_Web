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
            // Instructores (5)
            [
                'nombre_razon_social' => 'Diana Carolina Lagos Zelaya',
                'rtn' => '08011991012345',
                'direccion' => 'Colonia Lomas del Guijarro, calle principal, casa 102, Tegucigalpa, Francisco Morazán',
                'correo' => 'diana.lagos@sistema.local',
                'telefono' => '+50495456784',
                'user_id' => $users['diana.lagos@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Soluciones Backend Paz S. de R.L.',
                'rtn' => '05019012345678',
                'direccion' => 'Barrio Río de Piedras, 8va calle, 14 avenida, San Pedro Sula, Cortés',
                'correo' => 'roberto.paz@sistema.local',
                'telefono' => '+50494567895',
                'user_id' => $users['roberto.paz@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Sofía Alejandra Ramos Núñez',
                'rtn' => '08011993023456',
                'direccion' => 'Residencial Las Uvas, etapa 2, casa 18, Tegucigalpa, Francisco Morazán',
                'correo' => 'sofia.ramos@sistema.local',
                'telefono' => '+50493678906',
                'user_id' => $users['sofia.ramos@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Daniel Enrique Mejía Osorto',
                'rtn' => '08011990034567',
                'direccion' => 'Colonia Miraflores, bloque M, casa 22, Tegucigalpa, Francisco Morazán',
                'correo' => 'daniel.mejia@sistema.local',
                'telefono' => '+50492789017',
                'user_id' => $users['daniel.mejia@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Infraestructura y Código Salgado E.I.R.L.',
                'rtn' => '01019019876543',
                'direccion' => 'Barrio El Centro, avenida San Isidro, edificio Plaza, La Ceiba, Atlántida',
                'correo' => 'mario.salgado@sistema.local',
                'telefono' => '+50494990022',
                'user_id' => $users['mario.salgado@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Usuarios (12)
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
            [
                'nombre_razon_social' => 'Gabriela Nicole Portillo Cálix',
                'rtn' => '08011997045678',
                'direccion' => 'Colonia Kennedy, primera entrada, bloque 12, Tegucigalpa, Francisco Morazán',
                'correo' => 'gabriela.portillo@sistema.local',
                'telefono' => '+50498890128',
                'user_id' => $users['gabriela.portillo@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Fernando José Alvarado Gómez',
                'rtn' => '05011996056789',
                'direccion' => 'Colonia Jardines del Valle, 4ta etapa, casa 9, San Pedro Sula, Cortés',
                'correo' => 'fernando.alvarado@sistema.local',
                'telefono' => '+50497901239',
                'user_id' => $users['fernando.alvarado@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Paola Andrea Suazo Bueso',
                'rtn' => '08011999067890',
                'direccion' => 'Residencial El Trapiche, bloque C, casa 7, Tegucigalpa, Francisco Morazán',
                'correo' => 'paola.suazo@sistema.local',
                'telefono' => '+50496012340',
                'user_id' => $users['paola.suazo@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Héctor Mauricio Turcios Lanza',
                'rtn' => '03011995078901',
                'direccion' => 'Barrio Arriba, 2da calle, 3ra avenida, Comayagua, Comayagua',
                'correo' => 'hector.turcios@sistema.local',
                'telefono' => '+50495112244',
                'user_id' => $users['hector.turcios@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Natalia Sofía Zúniga Maradiaga',
                'rtn' => '08012000089012',
                'direccion' => 'Colonia Florencia Norte, calle principal, casa 31, Tegucigalpa, Francisco Morazán',
                'correo' => 'natalia.zuniga@sistema.local',
                'telefono' => '+50494223355',
                'user_id' => $users['natalia.zuniga@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Óscar René Escobar Delgado',
                'rtn' => '04011994090123',
                'direccion' => 'Barrio El Calvario, calle real, Santa Rosa de Copán, Copán',
                'correo' => 'oscar.escobar@sistema.local',
                'telefono' => '+50493334466',
                'user_id' => $users['oscar.escobar@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Lucía Elena Cáceres Montoya',
                'rtn' => '08011998101234',
                'direccion' => 'Colonia Tepeyac, avenida Juan Lindo, casa 19, Tegucigalpa, Francisco Morazán',
                'correo' => 'lucia.caceres@sistema.local',
                'telefono' => '+50492445577',
                'user_id' => $users['lucia.caceres@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Kevin Alejandro Amaya Valladares',
                'rtn' => '05011997112345',
                'direccion' => 'Residencial Los Castaños, bloque D, casa 11, San Pedro Sula, Cortés',
                'correo' => 'kevin.amaya@sistema.local',
                'telefono' => '+50498556688',
                'user_id' => $users['kevin.amaya@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Claudia Patricia Rivas Galeas',
                'rtn' => '07031996123456',
                'direccion' => 'Barrio El Centro, 4ta avenida, Danlí, El Paraíso',
                'correo' => 'claudia.rivas@sistema.local',
                'telefono' => '+50497667799',
                'user_id' => $users['claudia.rivas@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Diego Fernando Córdova Barahona',
                'rtn' => '06011999134567',
                'direccion' => 'Barrio La Merced, calle principal, Choluteca, Choluteca',
                'correo' => 'diego.cordova@sistema.local',
                'telefono' => '+50496778800',
                'user_id' => $users['diego.cordova@sistema.local'],
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre_razon_social' => 'Melissa Johanna Irías Fúnez',
                'rtn' => '08012001145678',
                'direccion' => 'Colonia Altos de Toncontín, bloque F, casa 5, Tegucigalpa, Francisco Morazán',
                'correo' => 'melissa.irias@sistema.local',
                'telefono' => '+50493001133',
                'user_id' => $users['melissa.irias@sistema.local'],
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