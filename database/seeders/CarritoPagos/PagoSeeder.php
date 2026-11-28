<?php

namespace Database\Seeders\CarritoPagos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $emailByUserId = DB::table('users')->pluck('email', 'id');
        $userIdByCarritoId = DB::table('carritos')->pluck('user_id', 'id');

        $ordenesPagadas = DB::table('ordenes')
            ->where('estado', 'pagada')
            ->orderBy('id')
            ->get();

        if ($ordenesPagadas->isEmpty()) {
            return;
        }

        $metodosPorEmail = [
            'gabriela.portillo@sistema.local' => [
                'metodo' => 'tarjeta',
                'ultimos_4' => '4821',
                'prefijo_ref' => 'TXN-CARD',
            ],
            'roberto.paz@sistema.local' => [
                'metodo' => 'transferencia',
                'ultimos_4' => null,
                'prefijo_ref' => 'TRF-BANCO',
            ],
        ];

        $indice = 1;

        foreach ($ordenesPagadas as $orden) {
            $userId = $userIdByCarritoId[$orden->carrito_id] ?? null;
            $email = $userId ? ($emailByUserId[$userId] ?? null) : null;

            $configPago = $email && isset($metodosPorEmail[$email])
                ? $metodosPorEmail[$email]
                : [
                    'metodo' => 'paypal',
                    'ultimos_4' => null,
                    'prefijo_ref' => 'PP-ORD',
                ];

            $referencia = sprintf('%s-2026-%05d', $configPago['prefijo_ref'], $indice);
            $fechaPago = $now->copy()->subDays(2)->addHours($indice);
            $indice++;

            $datos = [
                'metodo' => $configPago['metodo'],
                'referencia' => $referencia,
                'ultimos_4' => $configPago['ultimos_4'],
                'monto' => number_format((float) $orden->total, 2, '.', ''),
                'estado' => 'aprobado',
                'fecha_pago' => $fechaPago->format('Y-m-d H:i:s'),
                'updated_at' => $now,
            ];

            $pagoExistente = DB::table('pagos')
                ->where('orden_id', $orden->id)
                ->first();

            if ($pagoExistente) {
                DB::table('pagos')
                    ->where('id', $pagoExistente->id)
                    ->update($datos);
            } else {
                DB::table('pagos')->insert($datos + [
                    'orden_id' => $orden->id,
                    'created_at' => $fechaPago,
                ]);
            }
        }
    }
}