<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos')->cascadeOnDelete();
            $table->foreignId('leccion_id')->nullable()->constrained('lecciones')->nullOnDelete();
            $table->string('titulo');
            $table->enum('tipo', ['silabario', 'codigo_fuente', 'guia']);
            $table->string('nombre_original');
            $table->string('nombre_almacenado');
            $table->string('extension', 20);
            $table->string('mime_type', 100);
            $table->unsignedBigInteger('tamano_bytes');
            $table->string('ruta');
            $table->unsignedBigInteger('subido_por')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recursos');
    }
};