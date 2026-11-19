<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('orden_id')->nullable();

            $table->foreignId('cai_id')
                ->constrained('cai_rangos');

            $table->string('correlativo', 16)->unique();
            $table->dateTime('fecha_emision');

            $table->string('rtn_cliente', 14);
            $table->string('nombre_cliente');
            $table->string('direccion_cliente');

            $table->decimal('importe_exento', 12, 2)->default(0);
            $table->decimal('importe_gravado_15', 12, 2)->default(0);
            $table->decimal('isv_15', 12, 2)->default(0);
            $table->decimal('descuento', 12, 2)->default(0);
            $table->decimal('total', 12, 2);

            $table->text('total_letras');
            $table->enum('estado', ['emitida', 'anulada'])->default('emitida');
            $table->string('pdf_ruta')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};