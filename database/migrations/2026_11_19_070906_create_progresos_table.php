<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progresos', function (Blueprint $table) {
            $table->id();

            // Estudiante al que pertenece el progreso
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Curso en el que el estudiante está avanzando
            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnDelete();

            // Cantidad de lecciones completadas
            $table->unsignedInteger('lecciones_completadas')->default(0);

            // Cantidad total de lecciones del curso
            $table->unsignedInteger('total_lecciones')->default(0);

            // Porcentaje de avance del curso
            $table->decimal('porcentaje', 5, 2)->default(0);

            // Fecha en la que comenzó el curso
            $table->dateTime('fecha_inicio')->useCurrent();

            // Fecha del último avance registrado
            $table->dateTime('fecha_ultimo_avance')->nullable();

            // Fecha en la que terminó el curso
            $table->dateTime('fecha_completado')->nullable();

            // Evitar registros de progreso duplicados
            $table->unique(['user_id', 'curso_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progresos');
    }
};