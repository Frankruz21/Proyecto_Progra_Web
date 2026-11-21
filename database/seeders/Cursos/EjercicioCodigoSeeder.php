<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EjercicioCodigoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $leccionLaravelId = DB::table('lecciones')
            ->where('titulo', 'Estructura de carpetas y migraciones en Laravel')
            ->value('id');

        $leccionRedesId = DB::table('lecciones')
            ->where('titulo', 'Tablas de enrutamiento y pruebas de conectividad')
            ->value('id');

        $ejercicios = [
            [
                'leccion_id' => $leccionLaravelId,
                'enunciado' => 'Implementa una función en PHP que filtre y ordene un arreglo de usuarios activos por su nombre.',
                'lenguaje' => 'php',
                'codigo_inicial' => "<?php\n\nfunction usuariosActivosOrdenados(array \$usuarios): array\n{\n    // Tu código aquí\n}\n",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'leccion_id' => $leccionRedesId,
                'enunciado' => 'Escribe un script en Python que reciba una lista de prefijos IPv4 y devuelva los que pertenezcan a una red privada.',
                'lenguaje' => 'python',
                'codigo_inicial' => "import ipaddress\n\ndef filtrar_privadas(prefijos: list[str]) -> list[str]:\n    # Tu código aquí\n    pass\n",
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('ejercicios_codigo')->upsert(
            $ejercicios,
            ['leccion_id'],
            [
                'enunciado',
                'lenguaje',
                'codigo_inicial',
                'updated_at',
            ]
        );
    }
}