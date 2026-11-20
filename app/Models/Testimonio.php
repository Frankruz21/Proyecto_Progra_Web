<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    protected $fillable = [
        'texto',
        'calificacion',
        'aprobado',
        'user_id',
        'curso_id',
    ]; 
}
