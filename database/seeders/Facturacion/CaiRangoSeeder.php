<?php

namespace Database\Seeders\Facturacion;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaiRangoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $rangos = [
            [
                'cai' => 'A1B2C3-D4E5F6-G7H8I9-J0K1L2-M3N4O5-P6',
                'establecimiento' => '001',
                'punto_emision' => '001',
                'tipo_documento' => '01',
                'rango_inicial' => '00000001',
                'rango_final' => '00005000',
                'correlativo_actual' => '00000002',
                'fecha_limite_emision' => $now->copy()->addMonths(6)->toDateString(),
                'activo' => true,
                'created_at' => $now->copy()->subDays(15),
                'updated_at' => $now,
            ],
            [
                'cai' => 'Z9Y8X7-W6V5U4-T3S2R1-Q0P9O8-N7M6L5-K4',
                'establecimiento' => '001',
                'punto_emision' => '002',
                'tipo_documento' => '01',
                'rango_inicial' => '00000001',
                'rango_final' => '00001000',
                'correlativo_actual' => '00000000',
                'fecha_limite_emision' => $now->copy()->subDays(10)->toDateString(),
                'activo' => false,
                'created_at' => $now->copy()->subMonths(7),
                'updated_at' => $now->copy()->subDays(10),
            ],
        ];

        DB::table('cai_rangos')->upsert(
            $rangos,
            ['cai'],
            [
                'establecimiento',
                'punto_emision',
                'tipo_documento',
                'rango_inicial',
                'rango_final',
                'correlativo_actual',
                'fecha_limite_emision',
                'activo',
                'updated_at',
            ]
        );
    }
}
