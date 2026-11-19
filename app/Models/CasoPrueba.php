<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CasoPrueba extends Model
{
    use HasFactory;

    protected $table = 'casos_prueba';

    protected $fillable = [
        'ejercicio_id',
        'entrada',
        'salida_esperada',
        'oculto',
    ];

    protected function casts(): array
    {
        return [
            'oculto' => 'boolean',
        ];
    }

    public function ejercicio(): BelongsTo
    {
        return $this->belongsTo(EjercicioCodigo::class, 'ejercicio_id');
    }
}