<?php

namespace Database\Seeders\Facturacion;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BitacoraAuditoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $users = DB::table('users')->pluck('id', 'email');

        $adminId = $users['admin@sistema.local'] ?? null;
        $gabrielaId = $users['gabriela.portillo@sistema.local'] ?? null;
        $robertoId = $users['roberto.paz@sistema.local'] ?? null;

        $eventos = [];

        $ordenes = DB::table('ordenes')->orderBy('id')->get();
        foreach ($ordenes as $orden) {
            $eventos[] = [
                'user_id' => $gabrielaId ?? $adminId,
                'accion' => 'crear_orden',
                'tabla' => 'ordenes',
                'registro_id' => $orden->id,
                'datos_anteriores' => null,
                'datos_nuevos' => json_encode([
                    'numero' => $orden->numero,
                    'carrito_id' => $orden->carrito_id,
                    'total' => $orden->total,
                    'estado' => $orden->estado,
                ], JSON_UNESCAPED_UNICODE),
                'ip' => '190.53.12.104',
                'fecha' => $orden->fecha ?? $now->copy()->subDays(3)->format('Y-m-d H:i:s'),
                'created_at' => $now->copy()->subDays(3),
                'updated_at' => $now,
            ];
        }

        $pagos = DB::table('pagos')->orderBy('id')->get();
        foreach ($pagos as $pago) {
            $eventos[] = [
                'user_id' => $robertoId ?? $adminId,
                'accion' => 'aprobar_pago',
                'tabla' => 'pagos',
                'registro_id' => $pago->id,
                'datos_anteriores' => json_encode([
                    'estado' => 'pendiente',
                    'fecha_pago' => null,
                ], JSON_UNESCAPED_UNICODE),
                'datos_nuevos' => json_encode([
                    'orden_id' => $pago->orden_id,
                    'metodo' => $pago->metodo,
                    'referencia' => $pago->referencia,
                    'monto' => $pago->monto,
                    'estado' => $pago->estado,
                    'fecha_pago' => $pago->fecha_pago,
                ], JSON_UNESCAPED_UNICODE),
                'ip' => '190.53.12.118',
                'fecha' => $pago->fecha_pago ?? $now->copy()->subDays(2)->format('Y-m-d H:i:s'),
                'created_at' => $now->copy()->subDays(2),
                'updated_at' => $now,
            ];
        }

        $facturas = DB::table('facturas')->orderBy('id')->get();
        foreach ($facturas as $factura) {
            $eventos[] = [
                'user_id' => $adminId,
                'accion' => 'emitir_factura_sar',
                'tabla' => 'facturas',
                'registro_id' => $factura->id,
                'datos_anteriores' => null,
                'datos_nuevos' => json_encode([
                    'orden_id' => $factura->orden_id,
                    'cai_id' => $factura->cai_id,
                    'correlativo' => $factura->correlativo,
                    'rtn_cliente' => $factura->rtn_cliente,
                    'total' => $factura->total,
                    'estado' => $factura->estado,
                ], JSON_UNESCAPED_UNICODE),
                'ip' => '10.10.0.25',
                'fecha' => $factura->fecha_emision ?? $now->copy()->subDays(2)->format('Y-m-d H:i:s'),
                'created_at' => $now->copy()->subDays(2),
                'updated_at' => $now,
            ];
        }

        foreach ($eventos as $evento) {
            $datos = [
                'user_id' => $evento['user_id'],
                'datos_anteriores' => $evento['datos_anteriores'],
                'datos_nuevos' => $evento['datos_nuevos'],
                'ip' => $evento['ip'],
                'fecha' => $evento['fecha'],
                'updated_at' => $evento['updated_at'],
            ];

            $existente = DB::table('bitacora_auditoria')
                ->where('tabla', $evento['tabla'])
                ->where('registro_id', $evento['registro_id'])
                ->where('accion', $evento['accion'])
                ->first();

            if ($existente) {
                DB::table('bitacora_auditoria')
                    ->where('id', $existente->id)
                    ->update($datos);
            } else {
                DB::table('bitacora_auditoria')->insert($datos + [
                    'accion' => $evento['accion'],
                    'tabla' => $evento['tabla'],
                    'registro_id' => $evento['registro_id'],
                    'created_at' => $evento['created_at'],
                ]);
            }
        }
    }
}
