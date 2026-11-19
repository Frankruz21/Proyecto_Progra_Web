<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cai_rangos', function (Blueprint $table) {
            $table->id();
            $table->string('cai', 50)->unique();
            $table->string('establecimiento', 3);
            $table->string('punto_emision', 3);
            $table->string('tipo_documento', 2);
            $table->string('rango_inicial', 8);
            $table->string('rango_final', 8);
            $table->string('correlativo_actual', 8);
            $table->date('fecha_limite_emision');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cai_rangos');
    }
};