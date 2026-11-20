<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $fillable = [
        'orden_id',
        'metodo',
        'referencia',
        'ultimos_4',
        'monto',
        'estado',
        'fecha_pago'
    ];
}
