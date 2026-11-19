<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'descripcion_corta',
        'descripcion',
        'portada',
        'video_intro_url',
        'precio',
        'requisitos',
        'objetivos',
        'duracion_horas',
        'es_programacion',
        'es_destacado',
        'fecha_publicacion',
        'instructor_id',
        'categoria_id',
        'nivel_id',
        'idioma_id',
    ]; 
}
