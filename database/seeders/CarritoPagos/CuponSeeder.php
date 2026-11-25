<?php

namespace Database\Seeders\CarritoPagos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $cupones = [
            [
                'codigo' => 'BIENVENIDA10',
                'tipo_descuento' => 'porcentaje',
                'valor' => 10.00,
                'fecha_inicio' => $now->copy()->subDays(15)->toDateString(),
                'fecha_fin' => $now->copy()->addDays(45)->toDateString(),
                'usos_maximos' => 100,
                'usos_actuales' => 12,
                'activo' => true,
                'created_at' => $now->copy()->subDays(15),
                'updated_at' => $now,
            ],
            [
                'codigo' => 'PROMO20',
                'tipo_descuento' => 'porcentaje',
                'valor' => 20.00,
                'fecha_inicio' => $now->copy()->subDays(7)->toDateString(),
                'fecha_fin' => $now->copy()->addDays(20)->toDateString(),
                'usos_maximos' => 50,
                'usos_actuales' => 8,
                'activo' => true,
                'created_at' => $now->copy()->subDays(7),
                'updated_at' => $now,
            ],
            [
                'codigo' => 'DESCUENTO15USD',
                'tipo_descuento' => 'monto',
                'valor' => 15.00,
                'fecha_inicio' => $now->copy()->subDays(5)->toDateString(),
                'fecha_fin' => $now->copy()->addDays(30)->toDateString(),
                'usos_maximos' => null,
                'usos_actuales' => 3,
                'activo' => true,
                'created_at' => $now->copy()->subDays(5),
                'updated_at' => $now,
            ],
            [
                'codigo' => 'VIP50',
                'tipo_descuento' => 'monto',
                'valor' => 50.00,
                'fecha_inicio' => $now->copy()->subDays(3)->toDateString(),
                'fecha_fin' => $now->copy()->addDays(60)->toDateString(),
                'usos_maximos' => 25,
                'usos_actuales' => 5,
                'activo' => true,
                'created_at' => $now->copy()->subDays(3),
                'updated_at' => $now,
            ],
            [
                'codigo' => 'VERANO2025',
                'tipo_descuento' => 'porcentaje',
                'valor' => 15.00,
                'fecha_inicio' => $now->copy()->subMonths(4)->toDateString(),
                'fecha_fin' => $now->copy()->subMonths(2)->toDateString(),
                'usos_maximos' => 200,
                'usos_actuales' => 140,
                'activo' => false,
                'created_at' => $now->copy()->subMonths(4),
                'updated_at' => $now->copy()->subMonths(2),
            ],
        ];

        DB::table('cupones')->upsert(
            $cupones,
            ['codigo'],
            [
                'tipo_descuento',
                'valor',
                'fecha_inicio',
                'fecha_fin',
                'usos_maximos',
                'usos_actuales',
                'activo',
                'updated_at',
            ]
        );
    }
}