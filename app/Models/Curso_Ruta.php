<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso_Ruta extends Model
{
    protected $fillable = [
        'curso_id',
        'ruta_id',
        'orden',
    ]; 
}
