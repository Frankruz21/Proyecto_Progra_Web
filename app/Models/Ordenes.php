<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    protected $fillable = [
        'numero',
        'user_id',
        'cupon_id',
        'subtotal',
        'descuento',
        'gravado_15',
        'isv_15',
        'total',
        'estado',
        'fecha'
    ];
}
