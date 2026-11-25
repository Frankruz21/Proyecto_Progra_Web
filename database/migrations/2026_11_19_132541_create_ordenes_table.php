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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 30)->unique();
            $table->foreignId('carrito_id')->constrained('carritos')->restrictOnDelete();
            $table->foreignId('cupon_id')->nullable()->constrained('cupones')->nullOnDelete();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('descuento', 12, 2)->default(0);
            $table->decimal('gravado_15', 12, 2);
            $table->decimal('isv_15', 12, 2);
            $table->decimal('total', 12, 2);
            $table->enum('estado', ['pendiente', 'pagada', 'fallida'])->default('pendiente');
            $table->dateTime('fecha')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};
