<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\FacturaDetalle;
use App\Models\CaiRango;
use App\Models\Curso;
use App\Models\User;
use App\Models\BitacoraAuditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class FacturaController extends Controller
{
    // Listar facturas
    public function index()
    {
        return response()->json([
            'facturas' => Factura::with(['caiRango', 'detalles'])
                ->latest()
                ->get()
        ]);
    }

    // Consultar una factura
    public function show($id)
    {
        $factura = Factura::with(['caiRango', 'detalles'])
            ->findOrFail($id);

        return response()->json(['factura' => $factura]);
    }

    // Emitir factura por compra de curso
    public function store(Request $request)
    {
        $datos = $request->validate([
            'user_id' => 'required|exists:users,id',
            'curso_id' => 'required|exists:cursos,id',
            'cai_id' => 'required|exists:cai_rangos,id',
        ]);

        $factura = DB::transaction(function () use ($datos) {

            $usuario = User::findOrFail($datos['user_id']);

            $curso = Curso::findOrFail($datos['curso_id']);

            $cai = CaiRango::where('id', $datos['cai_id'])
                ->lockForUpdate()
                ->firstOrFail();

            // Validar vigencia del CAI
            if (!$cai->activo ||
                $cai->fecha_limite_emision->isPast()) {
                throw ValidationException::withMessages([
                    'cai_id' => 'El CAI está inactivo o vencido.'
                ]);
            }

            // Validar rango disponible
            $siguiente = (int) $cai->correlativo_actual + 1;

            if ($siguiente > (int) $cai->rango_final) {
                throw ValidationException::withMessages([
                    'cai_id' => 'El rango autorizado se ha agotado.'
                ]);
            }

            // Generar correlativo de 16 dígitos
            $correlativo = sprintf(
                '%03d-%03d-%02d-%08d',
                $cai->establecimiento,
                $cai->punto_emision,
                $cai->tipo_documento,
                $siguiente
            );

            $precio = (float) $curso->precio;
            $isv = round($precio * 0.15, 2);
            $total = round($precio + $isv, 2);

            $datosFiscales = $usuario->datosFiscales;

            if (!$datosFiscales) {
                throw ValidationException::withMessages([
                    'user_id' => 'El estudiante debe completar sus datos fiscales.'
                ]);
            }

            $factura = Factura::create([
                'cai_id' => $cai->id,
                'correlativo' => $correlativo,
                'fecha_emision' => now(),
                'rtn_cliente' => $datosFiscales->rtn,
                'nombre_cliente' => $datosFiscales->nombre,
                'direccion_cliente' => $datosFiscales->direccion,
                'importe_exento' => 0,
                'importe_gravado_15' => $precio,
                'isv_15' => $isv,
                'descuento' => 0,
                'total' => $total,
                'total_letras' => '',
                'estado' => 'emitida',
            ]);

            FacturaDetalle::create([
                'factura_id' => $factura->id,
                'curso_id' => $curso->id,
                'descripcion' => $curso->titulo,
                'cantidad' => 1,
                'precio_unitario' => $precio,
                'descuento' => 0,
                'tipo_impuesto' => 'ISV',
                'porcentaje_isv' => 15,
                'subtotal' => $precio,
            ]);

            $cai->correlativo_actual = $siguiente;
            $cai->save();

            BitacoraAuditoria::create([
                'user_id' => $usuario->id,
                'accion' => 'Emisión de factura',
                'tabla' => 'facturas',
                'registro_id' => $factura->id,
                'datos_nuevos' => $factura->toArray(),
                'ip' => request()->ip(),
                'fecha' => now(),
            ]);

            return $factura;
        });

        return response()->json([
            'mensaje' => 'Factura emitida correctamente.',
            'factura' => $factura->load('detalles')
        ], 201);
    }
}
