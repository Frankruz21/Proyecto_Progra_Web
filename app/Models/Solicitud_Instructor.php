<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud_Instructor extends Model
{
    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email',
        'especialidad',
        'biografia',
        'telefono',
        'fotografia',
        'curriculum',
        'estado',
        'fecha_revision',
        'revisado_por',
        'observaciones',
    ];  
}
