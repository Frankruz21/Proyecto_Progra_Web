<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();

            // Usuario que se matricula
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Curso al que se matricula
            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnDelete();

            // Fecha en que se realizó la matrícula
            $table->dateTime('fecha_matricula')->useCurrent();

            // Estado de la matrícula
            $table->string('estado', 20)->default('activa');

            // Fecha en que el estudiante finalizó el curso
            $table->dateTime('fecha_finalizacion')->nullable();

            // Evitar matrículas duplicadas del mismo usuario en el mismo curso
            $table->unique(['user_id', 'curso_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};