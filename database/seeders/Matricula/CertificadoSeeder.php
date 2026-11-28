<?php

namespace Database\Seeders\Matricula;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $matriculasFinalizadas = DB::table('matriculas')
            ->where('estado', 'finalizado')
            ->orderBy('id')
            ->get();

        if ($matriculasFinalizadas->isEmpty()) {
            return;
        }

        $progresosByKey = collect();
        if (DB::getSchemaBuilder()->hasTable('progresos')) {
            $progresosByKey = DB::table('progresos')
                ->whereIn('user_id', $matriculasFinalizadas->pluck('user_id')->unique())
                ->whereIn('curso_id', $matriculasFinalizadas->pluck('curso_id')->unique())
                ->get()
                ->keyBy(fn ($p) => $p->user_id.'-'.$p->curso_id);
        }

        $certificados = [];

        foreach ($matriculasFinalizadas as $matricula) {
            $clave = $matricula->user_id.'-'.$matricula->curso_id;
            $progreso = $progresosByKey[$clave] ?? null;

            // Si existe registro de progreso, aseguramos coherencia de finalización
            if ($progreso !== null && (float) $progreso->porcentaje < 100.00 && $progreso->fecha_completado === null) {
                continue;
            }

            $existente = DB::table('certificados')
                ->where('user_id', $matricula->user_id)
                ->where('curso_id', $matricula->curso_id)
                ->first();

            $codigo = $existente->codigo ?? sprintf(
                'UL-%04d-C%04d-U%04d',
                (int) $now->format('Y'),
                (int) $matricula->curso_id,
                (int) $matricula->user_id
            );

            $fechaEmision = $matricula->fecha_finalizacion
                ?? ($progreso->fecha_completado ?? $now->copy()->subDay()->format('Y-m-d H:i:s'));

            $certificados[$clave] = [
                'user_id' => $matricula->user_id,
                'curso_id' => $matricula->curso_id,
                'matricula_id' => $matricula->id,
                'codigo' => $codigo,
                'fecha_emision' => $fechaEmision,
                'url_certificado' => 'certificados/'.$codigo.'.pdf',
                'estado' => $existente->estado ?? 'emitido',
                'created_at' => $existente->created_at ?? $fechaEmision,
                'updated_at' => $now,
            ];
        }

        if ($certificados === []) {
            return;
        }

        DB::table('certificados')->upsert(
            array_values($certificados),
            ['user_id', 'curso_id'],
            [
                'matricula_id',
                'codigo',
                'fecha_emision',
                'url_certificado',
                'estado',
                'updated_at',
            ]
        );
    }
}