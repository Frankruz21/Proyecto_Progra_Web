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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_id')->constrained('ordenes')->cascadeOnDelete();
            $table->enum('metodo', ['tarjeta', 'transferencia', 'paypal']);
            $table->string('referencia', 100)->nullable();
            $table->string('ultimos_4', 4)->nullable();   // nunca guardar el número completo de la tarjeta
            $table->decimal('monto', 12, 2);
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->dateTime('fecha_pago')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
