<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('respuesta_opciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('respuesta_id')->constrained('respuestas_intento')->cascadeOnDelete();
            $table->foreignId('opcion_id')->constrained('opciones_pregunta')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['respuesta_id', 'opcion_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('respuesta_opciones');
    }
};