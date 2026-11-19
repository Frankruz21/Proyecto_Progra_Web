<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lecciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modulo_id')->constrained('modulos')->cascadeOnDelete();
            $table->string('titulo');
            $table->enum('tipo', ['video', 'lectura', 'examen', 'taller', 'codigo']);
            $table->string('url_contenido')->nullable();
            $table->longText('contenido')->nullable();
            $table->unsignedInteger('duracion_min')->default(0);
            $table->unsignedInteger('orden')->default(0);
            $table->boolean('es_preview')->default(false);
            $table->timestamps();

            $table->index(['modulo_id', 'orden']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lecciones');
    }
};