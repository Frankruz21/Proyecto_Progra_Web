<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnvioCodigo extends Model
{
    use HasFactory;

    protected $table = 'envios_codigo';

    protected $fillable = [
        'ejercicio_id',
        'user_id',
        'codigo',
        'casos_pasados',
        'casos_totales',
        'resultado',
        'detalle_salida',
        'fecha_envio',
    ];

    protected function casts(): array
    {
        return [
            'casos_pasados' => 'integer',
            'casos_totales' => 'integer',
            'fecha_envio' => 'datetime',
        ];
    }

    public function ejercicio(): BelongsTo
    {
        return $this->belongsTo(EjercicioCodigo::class, 'ejercicio_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}