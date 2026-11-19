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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->string('slug', 100)->unique();
            $table->string('descripcion_corta', 255);
            $table->text('descripcion');
            $table->string('portada');
            $table->string('video_intro_url')->nullable();
            $table->decimal('precio',10,2);
            $table->text('requisitos');
            $table->text('objetivos');
            $table->decimal('duracion_horas',5,2);
            $table->boolean('es_programacion')->default(true);
            $table->boolean('es_destacado')->default(false);
            $table->timestamp('fecha_publicacion')->nullable();
            $table->foreignId('instructor_id')->constrained('perfil_instructores');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('nivel_id')->constrained('niveles');
            $table->foreignId('idioma_id')->constrained('idiomas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
