<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datos_Fiscales extends Model
{
    protected $fillable = [
        'nombre_razon_social',
        'rtn',
        'direccion',
        'correo',
        'telefono',
        'user_id',
    ];
}
