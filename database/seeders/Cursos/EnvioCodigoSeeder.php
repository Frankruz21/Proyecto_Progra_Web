<?php

namespace Database\Seeders\Cursos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnvioCodigoSeeder extends Seeder
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

        $ejercicioPhpId = DB::table('ejercicios_codigo')
            ->where('leccion_id', $leccionLaravelId)
            ->value('id');

        $ejercicioPythonId = DB::table('ejercicios_codigo')
            ->where('leccion_id', $leccionRedesId)
            ->value('id');

        $usuarioId = DB::table('users')
            ->where('email', 'usuario@sistema.local')
            ->value('id');

        $adminId = DB::table('users')
            ->where('email', 'admin@sistema.local')
            ->value('id');

        $envios = [
            [
                'ejercicio_id' => $ejercicioPhpId,
                'user_id' => $usuarioId,
                'codigo' => "<?php\n\nfunction usuariosActivosOrdenados(array \$usuarios): array\n{\n    \$filtrados = array_values(array_filter(\$usuarios, fn(\$u) => \$u['activo'] === true));\n    usort(\$filtrados, fn(\$a, \$b) => strcmp(\$a['nombre'], \$b['nombre']));\n    return \$filtrados;\n}\n",
                'casos_pasados' => 1,
                'casos_totales' => 1,
                'resultado' => 'aprobado',
                'detalle_salida' => 'Todos los casos de prueba pasaron correctamente.',
                'fecha_envio' => $now->copy()->subMinutes(15),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'ejercicio_id' => $ejercicioPythonId,
                'user_id' => $adminId,
                'codigo' => "import ipaddress\n\ndef filtrar_privadas(prefijos: list[str]) -> list[str]:\n    return [p for p in prefijos if ipaddress.ip_network(p, strict=False).is_private]\n",
                'casos_pasados' => 1,
                'casos_totales' => 1,
                'resultado' => 'aprobado',
                'detalle_salida' => 'Salida coincidente con el caso de prueba esperado.',
                'fecha_envio' => $now->copy()->subMinutes(8),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('envios_codigo')->upsert(
            $envios,
            ['ejercicio_id', 'user_id', 'fecha_envio'],
            [
                'codigo',
                'casos_pasados',
                'casos_totales',
                'resultado',
                'detalle_salida',
                'updated_at',
            ]
        );
    }
}