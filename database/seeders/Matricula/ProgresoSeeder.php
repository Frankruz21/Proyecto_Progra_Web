<?php

namespace Database\Seeders\Matricula;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $matriculas = DB::table('matriculas')
            ->orderBy('id')
            ->get();

        if ($matriculas->isEmpty()) {
            return;
        }

        $totalLeccionesPorCurso = [];
        if (DB::getSchemaBuilder()->hasTable('modulos') && DB::getSchemaBuilder()->hasTable('lecciones')) {
            $conteos = DB::table('lecciones')
                ->join('modulos', 'lecciones.modulo_id', '=', 'modulos.id')
                ->select('modulos.curso_id', DB::raw('COUNT(lecciones.id) as total'))
                ->groupBy('modulos.curso_id')
                ->pluck('total', 'modulos.curso_id');

            $totalLeccionesPorCurso = $conteos->map(fn ($v) => (int) $v)->all();
        }

        $progresos = [];
        $indice = 0;

        foreach ($matriculas as $matricula) {
            $totalLecciones = $totalLeccionesPorCurso[$matricula->curso_id] ?? 10;
            $totalLecciones = max(0, $totalLecciones);

            $esFinalizado = ($matricula->estado === 'finalizado');

            if ($esFinalizado) {
                $completadas = $totalLecciones;
                $porcentaje = $totalLecciones > 0 ? 100.00 : 0.00;
            } else {
                if ($totalLecciones === 0) {
                    $completadas = 0;
                    $porcentaje = 0.00;
                } else {
                    $fraccion = (($indice % 3) + 1) / 4; // 25%, 50%, 75%
                    $completadas = min($totalLecciones, max(1, (int) round($totalLecciones * $fraccion)));
                    $porcentaje = round(($completadas / $totalLecciones) * 100, 2);
                }
            }

            $fechaInicio = $matricula->fecha_matricula ?? $now->copy()->subDays(2);
            $fechaCompletado = $esFinalizado
                ? ($matricula->fecha_finalizacion ?? $now->copy()->subDay()->format('Y-m-d H:i:s'))
                : null;
            $fechaUltimoAvance = $completadas > 0
                ? ($fechaCompletado ?? $now->copy()->subHours(6)->format('Y-m-d H:i:s'))
                : null;

            $progresos[$matricula->user_id.'-'.$matricula->curso_id] = [
                'user_id' => $matricula->user_id,
                'curso_id' => $matricula->curso_id,
                'matricula_id' => $matricula->id,
                'lecciones_completadas' => $completadas,
                'total_lecciones' => $totalLecciones,
                'porcentaje' => number_format($porcentaje, 2, '.', ''),
                'fecha_inicio' => $fechaInicio,
                'fecha_ultimo_avance' => $fechaUltimoAvance,
                'fecha_completado' => $fechaCompletado,
                'created_at' => $fechaInicio,
                'updated_at' => $now,
            ];

            $indice++;
        }

        if ($progresos === []) {
            return;
        }

        DB::table('progresos')->upsert(
            array_values($progresos),
            ['user_id', 'curso_id'],
            [
                'matricula_id',
                'lecciones_completadas',
                'total_lecciones',
                'porcentaje',
                'fecha_inicio',
                'fecha_ultimo_avance',
                'fecha_completado',
                'updated_at',
            ]
        );
    }
}