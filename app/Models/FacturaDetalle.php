<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacturaDetalle extends Model
{
    protected $fillable = [
        'factura_id',
        'curso_id',
        'descripcion',
        'cantidad',
        'precio_unitario',
        'descuento',
        'tipo_impuesto',
        'porcentaje_isv',
        'subtotal',
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'factura_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}