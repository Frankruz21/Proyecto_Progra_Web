<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupones extends Model
{
    protected $fillable = [
        'codigo',
        'tipo_descuento',
        'valor',
        'fecha_inicio',
        'fecha_fin',
        'usos_maximos',
        'usos_actuales',
        'activo'
    ];
}
