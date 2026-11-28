<?php

namespace Database\Seeders\Facturacion;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $rtn = '08019001122334';

        $datos = [
            'razon_social' => 'UniLearning S. de R.L.',
            'rtn' => $rtn,
            'direccion' => 'Bulevar Morazán, Torre Corporativa, Piso 6, Tegucigalpa, Francisco Morazán',
            'telefono' => '+50422398877',
            'correo' => 'unilearning@sistema.local',
            'logo' => 'empresa/logo-principal.png',
            'updated_at' => $now,
        ];

        $existente = DB::table('empresa')
            ->where('rtn', $rtn)
            ->first();

        if ($existente) {
            DB::table('empresa')
                ->where('id', $existente->id)
                ->update($datos);
        } else {
            DB::table('empresa')->insert($datos + [
                'created_at' => $now,
            ]);
        }
    }
}
