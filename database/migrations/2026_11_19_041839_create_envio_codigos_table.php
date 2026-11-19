<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('envios_codigo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ejercicio_id')->constrained('ejercicios_codigo')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->longText('codigo');
            $table->unsignedInteger('casos_pasados')->default(0);
            $table->unsignedInteger('casos_totales')->default(0);
            $table->string('resultado', 50)->default('pendiente');
            $table->text('detalle_salida')->nullable();
            $table->timestamp('fecha_envio')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('envios_codigo');
    }
};