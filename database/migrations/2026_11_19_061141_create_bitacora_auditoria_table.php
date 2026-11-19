<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bitacora_auditoria', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('accion');
            $table->string('tabla');
            $table->unsignedBigInteger('registro_id')->nullable();

            $table->json('datos_anteriores')->nullable();
            $table->json('datos_nuevos')->nullable();

            $table->string('ip', 45)->nullable();
            $table->timestamp('fecha')->useCurrent();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bitacora_auditoria');
    }
};