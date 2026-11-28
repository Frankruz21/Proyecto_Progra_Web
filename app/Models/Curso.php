<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class);
    }

    public function progresos(): HasMany
    {
        return $this->hasMany(Progreso::class);
    }

    public function certificados(): HasMany
    {
        return $this->hasMany(Certificado::class);
    }

    public function modulos()
    {
        return $this->hasMany(Modulo::class);
    }

    public function lecciones()
    {
        return $this->hasMany(Leccion::class);
    }

        public function instructor()
    {
        return $this->belongsTo(Perfil_Instructor::class, 'instructor_id');
    }
}