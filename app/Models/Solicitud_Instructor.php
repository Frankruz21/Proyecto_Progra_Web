<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud_Instructor extends Model
{
    protected $fillable = [
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
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
