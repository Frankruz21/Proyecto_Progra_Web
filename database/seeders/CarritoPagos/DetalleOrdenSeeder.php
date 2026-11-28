<?php

namespace Database\Seeders\CarritoPagos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleOrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $ordenes = DB::table('ordenes')->get()->keyBy('carrito_id');

        if ($ordenes->isEmpty()) {
            return;
        }

        $itemsPorCarrito = DB::table('carrito__items')
            ->whereIn('carrito_id', $ordenes->keys())
            ->get()
            ->groupBy('carrito_id');

        if ($itemsPorCarrito->isEmpty()) {
            return;
        }

        foreach ($itemsPorCarrito as $carritoId => $items) {
            $orden = $ordenes[$carritoId] ?? null;

            if (! $orden) {
                continue;
            }

            $subtotalItems = round((float) $items->sum('precio_unitario'), 2);
            $descuentoOrden = round((float) $orden->descuento, 2);

            foreach ($items as $item) {
                $precioUnitario = round((float) $item->precio_unitario, 2);

                $descuentoItem = 0.00;
                if ($descuentoOrden > 0 && $subtotalItems > 0) {
                    $descuentoItem = round($descuentoOrden * ($precioUnitario / $subtotalItems), 2);
                }

                $existe = DB::table('orden__detalles')
                    ->where('orden_id', $orden->id)
                    ->where('curso_id', $item->curso_id)
                    ->exists();

                $datos = [
                    'precio' => number_format($precioUnitario, 2, '.', ''),
                    'descuento' => number_format($descuentoItem, 2, '.', ''),
                    'updated_at' => $now,
                ];

                if ($existe) {
                    DB::table('orden__detalles')
                        ->where('orden_id', $orden->id)
                        ->where('curso_id', $item->curso_id)
                        ->update($datos);
                } else {
                    DB::table('orden__detalles')->insert($datos + [
                        'orden_id' => $orden->id,
                        'curso_id' => $item->curso_id,
                        'created_at' => $now,
                    ]);
                }
            }
        }
    }
}