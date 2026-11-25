<?php

namespace Database\Seeders\CarritoPagos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsCarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $users = DB::table('users')->pluck('id', 'email');
        $carritos = DB::table('carritos')->pluck('id', 'user_id');
        $cursos = DB::table('cursos')->pluck('id', 'slug');
        $preciosCursos = DB::table('cursos')->pluck('precio', 'id');

        $carritoUsuarioId = $carritos[$users['usuario@sistema.local']] ?? null;
        $carritoGabrielaId = $carritos[$users['gabriela.portillo@sistema.local']] ?? null;
        $carritoFernandoId = $carritos[$users['fernando.alvarado@sistema.local']] ?? null;
        $carritoPaolaId = $carritos[$users['paola.suazo@sistema.local']] ?? null;
        $carritoDianaId = $carritos[$users['diana.lagos@sistema.local']] ?? null;
        $carritoRobertoId = $carritos[$users['roberto.paz@sistema.local']] ?? null;

        $cursoLaravelId = $cursos['fundamentos-de-laravel-y-apis-rest'] ?? null;
        $cursoRedesId = $cursos['redes-empresariales-y-automatizacion-con-python'] ?? null;

        $itemsCandidatos = [
            [
                'carrito_id' => $carritoUsuarioId,
                'curso_id' => $cursoLaravelId,
                'precio_unitario' => $cursoLaravelId ? ($preciosCursos[$cursoLaravelId] ?? 49.99) : 49.99,
                'created_at' => $now->copy()->subDays(2),
                'updated_at' => $now->copy()->subHours(6),
            ],
            [
                'carrito_id' => $carritoUsuarioId,
                'curso_id' => $cursoRedesId,
                'precio_unitario' => $cursoRedesId ? ($preciosCursos[$cursoRedesId] ?? 59.99) : 59.99,
                'created_at' => $now->copy()->subDays(2),
                'updated_at' => $now->copy()->subHours(5),
            ],
            [
                'carrito_id' => $carritoGabrielaId,
                'curso_id' => $cursoLaravelId,
                'precio_unitario' => $cursoLaravelId ? ($preciosCursos[$cursoLaravelId] ?? 49.99) : 49.99,
                'created_at' => $now->copy()->subDays(5),
                'updated_at' => $now->copy()->subDays(4),
            ],
            [
                'carrito_id' => $carritoFernandoId,
                'curso_id' => $cursoRedesId,
                'precio_unitario' => $cursoRedesId ? ($preciosCursos[$cursoRedesId] ?? 59.99) : 59.99,
                'created_at' => $now->copy()->subDay(),
                'updated_at' => $now->copy()->subHours(3),
            ],
            [
                'carrito_id' => $carritoPaolaId,
                'curso_id' => $cursoLaravelId,
                'precio_unitario' => $cursoLaravelId ? ($preciosCursos[$cursoLaravelId] ?? 49.99) : 49.99,
                'created_at' => $now->copy()->subDays(6),
                'updated_at' => $now->copy()->subDays(5),
            ],
            [
                'carrito_id' => $carritoDianaId,
                'curso_id' => $cursoRedesId,
                'precio_unitario' => $cursoRedesId ? ($preciosCursos[$cursoRedesId] ?? 59.99) : 59.99,
                'created_at' => $now->copy()->subDays(3),
                'updated_at' => $now->copy()->subHours(4),
            ],
            [
                'carrito_id' => $carritoRobertoId,
                'curso_id' => $cursoLaravelId,
                'precio_unitario' => $cursoLaravelId ? ($preciosCursos[$cursoLaravelId] ?? 49.99) : 49.99,
                'created_at' => $now->copy()->subDays(7),
                'updated_at' => $now->copy()->subDays(6),
            ],
        ];

        $items = array_values(array_filter(
            $itemsCandidatos,
            fn (array $item) => ! is_null($item['carrito_id']) && ! is_null($item['curso_id'])
        ));

        if ($items === []) {
            return;
        }

        DB::table('carrito__items')->upsert(
            $items,
            ['carrito_id', 'curso_id'],
            [
                'precio_unitario',
                'updated_at',
            ]
        );
    }
}