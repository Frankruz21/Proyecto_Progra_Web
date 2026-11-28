<?php

namespace Database\Seeders\CarritoPagos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $users = DB::table('users')->pluck('id', 'email');
        $emailByUserId = DB::table('users')->pluck('email', 'id');

        $cuponesById = DB::table('cupones')
            ->select('id', 'codigo', 'tipo_descuento', 'valor')
            ->get()
            ->keyBy('id');

        $carritosOrdenados = DB::table('carritos')
            ->where('estado', 'Ordenado')
            ->get();

        if ($carritosOrdenados->isEmpty()) {
            return;
        }

        $subtotalesPorCarrito = DB::table('carrito__items')
            ->whereIn('carrito_id', $carritosOrdenados->pluck('id'))
            ->selectRaw('carrito_id, COALESCE(SUM(precio_unitario), 0) as subtotal')
            ->groupBy('carrito_id')
            ->pluck('subtotal', 'carrito_id');

        $estadosPorEmail = [
            'gabriela.portillo@sistema.local' => 'pagada',
            'paola.suazo@sistema.local' => 'pendiente',
            'roberto.paz@sistema.local' => 'pagada',
            'daniel.mejia@sistema.local' => 'fallida',
        ];

        $ordenes = [];
        $consecutivo = 1;

        foreach ($carritosOrdenados as $carrito) {
            $email = $emailByUserId[$carrito->user_id] ?? null;
            $subtotal = round((float) ($subtotalesPorCarrito[$carrito->id] ?? 49.99), 2);

            $descuento = 0.00;
            if (! is_null($carrito->cupon_id) && isset($cuponesById[$carrito->cupon_id])) {
                $cupon = $cuponesById[$carrito->cupon_id];
                if ($cupon->tipo_descuento === 'porcentaje') {
                    $descuento = round($subtotal * ((float) $cupon->valor / 100), 2);
                } elseif ($cupon->tipo_descuento === 'monto') {
                    $descuento = round(min($subtotal, (float) $cupon->valor), 2);
                }
            }

            $gravado15 = round(max(0, $subtotal - $descuento), 2);
            $isv15 = round($gravado15 * 0.15, 2);
            $total = round($gravado15 + $isv15, 2);

            $numeroOrden = sprintf('ORD-2026-%05d', $consecutivo);
            $consecutivo++;

            // Asegura que el carrito provenga de un usuario válido si existe el mapa
            $userIdValido = $email && isset($users[$email]) ? $users[$email] : $carrito->user_id;
            if (is_null($userIdValido)) {
                continue;
            }

            $ordenes[] = [
                'numero' => $numeroOrden,
                'carrito_id' => $carrito->id,
                'cupon_id' => $carrito->cupon_id,
                'subtotal' => number_format($subtotal, 2, '.', ''),
                'descuento' => number_format($descuento, 2, '.', ''),
                'gravado_15' => number_format($gravado15, 2, '.', ''),
                'isv_15' => number_format($isv15, 2, '.', ''),
                'total' => number_format($total, 2, '.', ''),
                'estado' => $email ? ($estadosPorEmail[$email] ?? 'pendiente') : 'pendiente',
                'fecha' => $now->copy()->subDays(3)->format('Y-m-d H:i:s'),
                'created_at' => $now->copy()->subDays(3),
                'updated_at' => $now,
            ];
        }

        if ($ordenes === []) {
            return;
        }

        DB::table('ordenes')->upsert(
            $ordenes,
            ['numero'],
            [
                'carrito_id',
                'cupon_id',
                'subtotal',
                'descuento',
                'gravado_15',
                'isv_15',
                'total',
                'estado',
                'fecha',
                'updated_at',
            ]
        );
    }
}