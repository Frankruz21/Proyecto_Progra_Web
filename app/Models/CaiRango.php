<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaiRango extends Model
{
    protected $table = 'cai_rangos';

    protected $fillable = [
        'cai',
        'establecimiento',
        'punto_emision',
        'tipo_documento',
        'rango_inicial',
        'rango_final',
        'correlativo_actual',
        'fecha_limite_emision',
        'activo',
    ];

    protected $casts = [
        'fecha_limite_emision' => 'date',
        'activo' => 'boolean',
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'cai_id');
    }
}