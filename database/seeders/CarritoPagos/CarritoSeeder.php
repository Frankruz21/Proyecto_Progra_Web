<?php

namespace Database\Seeders\CarritoPagos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $users = DB::table('users')->pluck('id', 'email');
        $cupones = DB::table('cupones')->pluck('id', 'codigo');

        $carritos = [
            // Usuarios
            [
                'estado' => 'Activo',
                'user_id' => $users['usuario@sistema.local'],
                'cupon_id' => $cupones['BIENVENIDA10'] ?? null,
                'created_at' => $now->copy()->subDays(2),
                'updated_at' => $now->copy()->subHours(6),
            ],
            [
                'estado' => 'Ordenado',
                'user_id' => $users['gabriela.portillo@sistema.local'],
                'cupon_id' => $cupones['PROMO20'] ?? null,
                'created_at' => $now->copy()->subDays(5),
                'updated_at' => $now->copy()->subDays(4),
            ],
            [
                'estado' => 'Activo',
                'user_id' => $users['fernando.alvarado@sistema.local'],
                'cupon_id' => null,
                'created_at' => $now->copy()->subDay(),
                'updated_at' => $now->copy()->subHours(3),
            ],
            [
                'estado' => 'Ordenado',
                'user_id' => $users['paola.suazo@sistema.local'],
                'cupon_id' => $cupones['DESCUENTO15USD'] ?? null,
                'created_at' => $now->copy()->subDays(6),
                'updated_at' => $now->copy()->subDays(5),
            ],
            [
                'estado' => 'Activo',
                'user_id' => $users['hector.turcios@sistema.local'],
                'cupon_id' => null,
                'created_at' => $now->copy()->subHours(14),
                'updated_at' => $now->copy()->subHour(),
            ],

            // Instructores
            [
                'estado' => 'Activo',
                'user_id' => $users['diana.lagos@sistema.local'],
                'cupon_id' => $cupones['VIP50'] ?? null,
                'created_at' => $now->copy()->subDays(3),
                'updated_at' => $now->copy()->subHours(4),
            ],
            [
                'estado' => 'Ordenado',
                'user_id' => $users['roberto.paz@sistema.local'],
                'cupon_id' => $cupones['BIENVENIDA10'] ?? null,
                'created_at' => $now->copy()->subDays(7),
                'updated_at' => $now->copy()->subDays(6),
            ],
            [
                'estado' => 'Activo',
                'user_id' => $users['sofia.ramos@sistema.local'],
                'cupon_id' => null,
                'created_at' => $now->copy()->subDays(2),
                'updated_at' => $now->copy()->subHours(8),
            ],
            [
                'estado' => 'Ordenado',
                'user_id' => $users['daniel.mejia@sistema.local'],
                'cupon_id' => $cupones['PROMO20'] ?? null,
                'created_at' => $now->copy()->subDays(4),
                'updated_at' => $now->copy()->subDays(3),
            ],
            [
                'estado' => 'Activo',
                'user_id' => $users['mario.salgado@sistema.local'],
                'cupon_id' => $cupones['DESCUENTO15USD'] ?? null,
                'created_at' => $now->copy()->subHours(20),
                'updated_at' => $now->copy()->subHours(2),
            ],
        ];

        DB::table('carritos')->upsert(
            $carritos,
            ['user_id'],
            [
                'estado',
                'cupon_id',
                'updated_at',
            ]
        );
    }
}
