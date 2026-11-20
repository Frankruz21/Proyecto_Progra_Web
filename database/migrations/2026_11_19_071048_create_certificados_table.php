<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();

            // Estudiante que obtiene el certificado
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Curso que completó el estudiante
            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnDelete();

            // Código único para verificar el certificado
            $table->string('codigo', 100)->unique();

            // Fecha de emisión del certificado
            $table->dateTime('fecha_emision')->useCurrent();

            // Ruta del archivo del certificado (PDF)
            $table->string('url_certificado')->nullable();

            // Estado del certificado
            $table->enum('estado', ['emitido', 'anulado'])->default('emitido');

            // Evitar emitir dos certificados para el mismo estudiante y curso
            $table->unique(['user_id', 'curso_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificados');
    }
};