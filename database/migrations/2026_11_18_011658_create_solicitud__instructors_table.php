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
        Schema::create('solicitud_instructores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre1', 100);
            $table->string('nombre2', 100)->nullable();
            $table->string('apellido1', 100);
            $table->string('apellido2', 100)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('especialidad', 100);
            $table->text('biografia');
            $table->string('telefono', 20);
            $table->string('curriculum');
            $table->enum('estado',['pendiente', 'aprobada', 'rechazada'])->default('pendiente');
            $table->timestamp('fecha_revision')->nullable();
            $table->foreignId('revisado_por')->nullable()->constrained('users')->nullOnDelete();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud__instructores');
    }
};
