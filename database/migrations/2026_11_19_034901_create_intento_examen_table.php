<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('intentos_examen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examen_id')->constrained('examenes')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedInteger('numero_intento')->default(1);
            $table->enum('estado', ['en_progreso', 'finalizado', 'abandonado'])->default('en_progreso');
            $table->decimal('puntaje', 5, 2)->nullable();
            $table->boolean('aprobado')->default(false);
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_fin')->nullable();
            $table->timestamps();

            $table->unique(['examen_id', 'user_id', 'numero_intento']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('intentos_examen');
    }
};