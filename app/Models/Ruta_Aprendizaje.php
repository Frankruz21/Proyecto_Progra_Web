<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruta_Aprendizaje extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'activo',
    ]; 
}
