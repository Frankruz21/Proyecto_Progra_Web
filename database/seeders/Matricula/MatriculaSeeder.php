<?php

namespace Database\Seeders\Matricula;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $ordenesPagadas = DB::table('ordenes')
            ->where('estado', 'pagada')
            ->orderBy('id')
            ->get();

        if ($ordenesPagadas->isEmpty()) {
            return;
        }

        $carritosById = DB::table('carritos')
            ->whereIn('id', $ordenesPagadas->pluck('carrito_id')->filter())
            ->get()
            ->keyBy('id');

        $detallesPorOrden = DB::table('orden__detalles')
            ->whereIn('orden_id', $ordenesPagadas->pluck('id'))
            ->orderBy('id')
            ->get()
            ->groupBy('orden_id');

        $itemsPorCarrito = DB::table('carrito__items')
            ->whereIn('carrito_id', $ordenesPagadas->pluck('carrito_id')->filter())
            ->orderBy('id')
            ->get()
            ->groupBy('carrito_id');

        $matriculas = [];
        $indice = 0;

        foreach ($ordenesPagadas as $orden) {
            $carrito = $carritosById[$orden->carrito_id] ?? null;
            $userId = $carrito->user_id ?? null;

            if (! $userId) {
                continue;
            }

            $cursosIds = collect();

            if (isset($detallesPorOrden[$orden->id])) {
                $cursosIds = $detallesPorOrden[$orden->id]->pluck('curso_id');
            } elseif ($carrito && isset($itemsPorCarrito[$carrito->id])) {
                $cursosIds = $itemsPorCarrito[$carrito->id]->pluck('curso_id');
            }

            foreach ($cursosIds->filter()->unique() as $cursoId) {
                $fechaMatricula = $orden->fecha ?? $now->copy()->subDays(2);
                $esFinalizado = ($indice % 2 === 1);

                $matriculas[$userId.'-'.$cursoId] = [
                    'user_id' => $userId,
                    'curso_id' => $cursoId,
                    'orden_id' => $orden->id,
                    'fecha_matricula' => $fechaMatricula,
                    'estado' => $esFinalizado ? 'finalizado' : 'activo',
                    'fecha_finalizacion' => $esFinalizado
                        ? $now->copy()->subDay()->format('Y-m-d H:i:s')
                        : null,
                    'created_at' => $fechaMatricula,
                    'updated_at' => $now,
                ];

                $indice++;
            }
        }

        if ($matriculas === []) {
            return;
        }

        DB::table('matriculas')->upsert(
            array_values($matriculas),
            ['user_id', 'curso_id'],
            [
                'orden_id',
                'fecha_matricula',
                'estado',
                'fecha_finalizacion',
                'updated_at',
            ]
        );
    }
}
