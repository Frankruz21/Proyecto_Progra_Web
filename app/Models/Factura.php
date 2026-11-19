<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = [
        'orden_id',
        'cai_id',
        'correlativo',
        'fecha_emision',
        'rtn_cliente',
        'nombre_cliente',
        'direccion_cliente',
        'importe_exento',
        'importe_gravado_15',
        'isv_15',
        'descuento',
        'total',
        'total_letras',
        'estado',
        'pdf_ruta',
    ];

    protected $casts = [
        'fecha_emision' => 'datetime',
    ];

    public function caiRango()
    {
        return $this->belongsTo(CaiRango::class, 'cai_id');
    }

    public function detalles()
    {
        return $this->hasMany(FacturaDetalle::class, 'factura_id');
    }
}