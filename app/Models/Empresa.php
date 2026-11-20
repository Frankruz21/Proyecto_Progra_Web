<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    protected $fillable = [
        'razon_social',
        'rtn',
        'direccion',
        'telefono',
        'correo',
        'logo',
    ];
}