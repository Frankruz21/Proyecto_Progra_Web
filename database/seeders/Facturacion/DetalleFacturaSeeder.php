<?php

namespace Database\Seeders\Facturacion;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleFacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $facturas = DB::table('facturas')
            ->whereNotNull('orden_id')
            ->get()
            ->keyBy('orden_id');

        if ($facturas->isEmpty()) {
            return;
        }

        $detallesOrden = DB::table('orden__detalles')
            ->whereIn('orden_id', $facturas->keys())
            ->orderBy('id')
            ->get()
            ->groupBy('orden_id');

        if ($detallesOrden->isEmpty()) {
            return;
        }

        $cursosById = DB::table('cursos')
            ->select('id', 'titulo')
            ->get()
            ->keyBy('id');

        foreach ($detallesOrden as $ordenId => $detalles) {
            $factura = $facturas[$ordenId] ?? null;

            if (! $factura) {
                continue;
            }

            foreach ($detalles as $detalleOrden) {
                $curso = isset($cursosById[$detalleOrden->curso_id])
                    ? $cursosById[$detalleOrden->curso_id]
                    : null;

                $descripcion = $curso
                    ? 'Curso: '.$curso->titulo
                    : 'Curso ID #'.$detalleOrden->curso_id;

                $cantidad = 1.00;
                $precioUnitario = round((float) $detalleOrden->precio, 2);
                $descuento = round((float) $detalleOrden->descuento, 2);
                $subtotal = round(max(0, ($precioUnitario * $cantidad) - $descuento), 2);

                $datos = [
                    'descripcion' => $descripcion,
                    'cantidad' => number_format($cantidad, 2, '.', ''),
                    'precio_unitario' => number_format($precioUnitario, 2, '.', ''),
                    'descuento' => number_format($descuento, 2, '.', ''),
                    'tipo_impuesto' => 'ISV',
                    'porcentaje_isv' => number_format(15, 2, '.', ''),
                    'subtotal' => number_format($subtotal, 2, '.', ''),
                    'updated_at' => $now,
                ];

                $existente = DB::table('factura_detalles')
                    ->where('factura_id', $factura->id)
                    ->where('curso_id', $detalleOrden->curso_id)
                    ->where('descripcion', $descripcion)
                    ->first();

                if ($existente) {
                    DB::table('factura_detalles')
                        ->where('id', $existente->id)
                        ->update($datos);
                } else {
                    DB::table('factura_detalles')->insert($datos + [
                        'factura_id' => $factura->id,
                        'curso_id' => $detalleOrden->curso_id,
                        'created_at' => $factura->fecha_emision ?? $now,
                    ]);
                }
            }
        }
    }
}
