<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito_Items extends Model
{
    protected $fillable = [
        'carrito_id',
        'curso_id',
        'precio_unitario'
    ];
}
