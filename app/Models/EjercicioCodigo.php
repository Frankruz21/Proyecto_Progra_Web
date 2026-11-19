<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EjercicioCodigo extends Model
{
    use HasFactory;

    protected $table = 'ejercicios_codigo';

    protected $fillable = [
        'leccion_id',
        'enunciado',
        'lenguaje',
        'codigo_inicial',
    ];

    public function leccion(): BelongsTo
    {
        return $this->belongsTo(Leccion::class, 'leccion_id');
    }

    public function casosPrueba(): HasMany
    {
        return $this->hasMany(CasoPrueba::class, 'ejercicio_id');
    }

    public function envios(): HasMany
    {
        return $this->hasMany(EnvioCodigo::class, 'ejercicio_id');
    }
}