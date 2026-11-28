<?php

namespace Database\Seeders\Facturacion;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $rangoActivo = DB::table('cai_rangos')
            ->where('activo', true)
            ->orderBy('id')
            ->first();

        if (! $rangoActivo) {
            return;
        }

        $ordenesPagadas = DB::table('ordenes')
            ->where('estado', 'pagada')
            ->orderBy('id')
            ->get();

        if ($ordenesPagadas->isEmpty()) {
            return;
        }

        $carritosById = DB::table('carritos')
            ->whereIn('id', $ordenesPagadas->pluck('carrito_id'))
            ->get()
            ->keyBy('id');

        $usersById = DB::table('users')
            ->select(
                'id',
                'primer_nombre',
                'segundo_nombre',
                'primer_apellido',
                'segundo_apellido',
                'email'
            )
            ->get()
            ->keyBy('id');

        $datosFiscalesByUserId = DB::table('datos_fiscales')
            ->get()
            ->keyBy('user_id');

        $facturas = [];
        $secuencia = (int) $rangoActivo->rango_inicial;
        $ultimoNumeroUsado = (int) $rangoActivo->correlativo_actual;

        foreach ($ordenesPagadas as $orden) {
            $facturaExistente = DB::table('facturas')
                ->where('orden_id', $orden->id)
                ->first();

            if ($facturaExistente) {
                $correlativo = $facturaExistente->correlativo;
            } else {
                $numeroCorrelativo = max($secuencia, $ultimoNumeroUsado > 0 ? $ultimoNumeroUsado + 1 : $secuencia);
                $correlativo8 = str_pad((string) $numeroCorrelativo, 8, '0', STR_PAD_LEFT);
                $correlativo = $rangoActivo->establecimiento
                    .$rangoActivo->punto_emision
                    .$rangoActivo->tipo_documento
                    .$correlativo8;

                $ultimoNumeroUsado = $numeroCorrelativo;
                $secuencia = $numeroCorrelativo + 1;
            }

            $carrito = $carritosById[$orden->carrito_id] ?? null;
            $user = ($carrito && isset($usersById[$carrito->user_id]))
                ? $usersById[$carrito->user_id]
                : null;
            $fiscal = ($user && isset($datosFiscalesByUserId[$user->id]))
                ? $datosFiscalesByUserId[$user->id]
                : null;

            $nombreUsuario = null;
            if ($user) {
                $partesNombre = array_filter([
                    $user->primer_nombre ?? null,
                    $user->segundo_nombre ?? null,
                    $user->primer_apellido ?? null,
                    $user->segundo_apellido ?? null,
                ]);
                $nombreUsuario = $partesNombre !== [] ? implode(' ', $partesNombre) : null;
            }

            $rtnCliente = $fiscal->rtn ?? '08011999012345';
            $nombreCliente = $fiscal->nombre_razon_social
                ?? $nombreUsuario
                ?? 'Consumidor Final';
            $direccionCliente = $fiscal->direccion ?? 'Tegucigalpa, Francisco Morazán';

            $importeExento = 0.00;
            $importeGravado15 = round((float) $orden->gravado_15, 2);
            $isv15 = round((float) $orden->isv_15, 2);
            $descuento = round((float) $orden->descuento, 2);
            $total = round((float) $orden->total, 2);

            $fechaEmision = $now->copy()->subDays(2);

            $facturas[] = [
                'orden_id' => $orden->id,
                'cai_id' => $rangoActivo->id,
                'correlativo' => $correlativo,
                'fecha_emision' => $fechaEmision->format('Y-m-d H:i:s'),
                'rtn_cliente' => substr($rtnCliente, 0, 14),
                'nombre_cliente' => $nombreCliente,
                'direccion_cliente' => $direccionCliente,
                'importe_exento' => number_format($importeExento, 2, '.', ''),
                'importe_gravado_15' => number_format($importeGravado15, 2, '.', ''),
                'isv_15' => number_format($isv15, 2, '.', ''),
                'descuento' => number_format($descuento, 2, '.', ''),
                'total' => number_format($total, 2, '.', ''),
                'total_letras' => $this->montoEnLetras($total),
                'estado' => 'emitida',
                'pdf_ruta' => 'facturas/'.$correlativo.'.pdf',
                'created_at' => $fechaEmision,
                'updated_at' => $now,
            ];
        }

        if ($facturas === []) {
            return;
        }

        DB::table('facturas')->upsert(
            $facturas,
            ['correlativo'],
            [
                'orden_id',
                'cai_id',
                'fecha_emision',
                'rtn_cliente',
                'nombre_cliente',
                'direccion_cliente',
                'importe_exento',
                'importe_gravado_15',
                'isv_15',
                'descuento',
                'total',
                'total_letras',
                'estado',
                'pdf_ruta',
                'updated_at',
            ]
        );

        if ($ultimoNumeroUsado > (int) $rangoActivo->correlativo_actual) {
            DB::table('cai_rangos')
                ->where('id', $rangoActivo->id)
                ->update([
                    'correlativo_actual' => str_pad((string) $ultimoNumeroUsado, 8, '0', STR_PAD_LEFT),
                    'updated_at' => $now,
                ]);
        }
    }

    private function montoEnLetras(float $monto): string
    {
        $entero = (int) floor($monto);
        $centavos = (int) round(($monto - $entero) * 100);

        if ($centavos === 100) {
            $entero++;
            $centavos = 0;
        }

        $unidades = [
            0 => 'CERO', 1 => 'UNO', 2 => 'DOS', 3 => 'TRES', 4 => 'CUATRO',
            5 => 'CINCO', 6 => 'SEIS', 7 => 'SIETE', 8 => 'OCHO', 9 => 'NUEVE',
            10 => 'DIEZ', 11 => 'ONCE', 12 => 'DOCE', 13 => 'TRECE', 14 => 'CATORCE',
            15 => 'QUINCE', 16 => 'DIECISÉIS', 17 => 'DIECISIETE', 18 => 'DIECIOCHO', 19 => 'DIECINUEVE',
            20 => 'VEINTE', 21 => 'VEINTIUNO', 22 => 'VEINTIDÓS', 23 => 'VEINTITRÉS', 24 => 'VEINTICUATRO',
            25 => 'VEINTICINCO', 26 => 'VEINTISÉIS', 27 => 'VEINTISIETE', 28 => 'VEINTIOCHO', 29 => 'VEINTINUEVE',
        ];

        $decenas = [
            30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA',
            60 => 'SESENTA', 70 => 'SETENTA', 80 => 'OCHENTA', 90 => 'NOVENTA',
        ];

        $centenas = [
            100 => 'CIEN', 200 => 'DOSCIENTOS', 300 => 'TRESCIENTOS', 400 => 'CUATROCIENTOS',
            500 => 'QUINIENTOS', 600 => 'SEISCIENTOS', 700 => 'SETECIENTOS', 800 => 'OCHOCIENTOS',
            900 => 'NOVECIENTOS',
        ];

        $convertirMenorMil = function (int $n) use ($unidades, $decenas, $centenas): string {
            if ($n < 30) {
                return $unidades[$n];
            }

            if ($n < 100) {
                $d = (int) (floor($n / 10) * 10);
                $u = $n % 10;

                return $u === 0 ? $decenas[$d] : $decenas[$d].' Y '.$unidades[$u];
            }

            $c = (int) (floor($n / 100) * 100);
            $resto = $n % 100;

            if ($c === 100) {
                $textoCentena = $resto === 0 ? 'CIEN' : 'CIENTO';
            } else {
                $textoCentena = $centenas[$c];
            }

            if ($resto === 0) {
                return $textoCentena;
            }

            $d = (int) (floor($resto / 10) * 10);
            $u = $resto % 10;

            if ($resto < 30) {
                $textoResto = $unidades[$resto];
            } elseif ($u === 0) {
                $textoResto = $decenas[$d];
            } else {
                $textoResto = $decenas[$d].' Y '.$unidades[$u];
            }

            return $textoCentena.' '.$textoResto;
        };

        if ($entero === 0) {
            $textoEntero = 'CERO';
        } elseif ($entero < 1000) {
            $textoEntero = $convertirMenorMil($entero);
        } elseif ($entero < 1000000) {
            $miles = (int) floor($entero / 1000);
            $resto = $entero % 1000;
            $textoMiles = $miles === 1 ? 'MIL' : $convertirMenorMil($miles).' MIL';
            $textoEntero = $resto === 0 ? $textoMiles : $textoMiles.' '.$convertirMenorMil($resto);
        } else {
            $textoEntero = (string) $entero;
        }

        return sprintf('%s LEMPIRAS CON %02d/100', $textoEntero, $centavos);
    }
}