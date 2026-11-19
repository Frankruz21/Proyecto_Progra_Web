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
        Schema::create('invitacion_instructores', function (Blueprint $table) {
            $table->id();
            $table->string('token_hash')->unique();
            $table->timestamp('expira_en');
            $table->timestamp('usado_en')->nullable();
            $table->foreignId('solicitud_id')->constrained('solicitud_instructores')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitacion___instructores');
    }
};
