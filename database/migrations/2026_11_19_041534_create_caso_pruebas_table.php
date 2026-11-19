<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('casos_prueba', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ejercicio_id')->constrained('ejercicios_codigo')->cascadeOnDelete();
            $table->text('entrada')->nullable();
            $table->text('salida_esperada');
            $table->boolean('oculto')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('casos_prueba');
    }
};