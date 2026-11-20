<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden_Detalles extends Model
{
    protected $fillable = [
        'orden_id',
        'curso_id',
        'precio',
        'descuento'
    ];
}
