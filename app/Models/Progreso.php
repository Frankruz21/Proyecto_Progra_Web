<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progreso extends Model
{
    protected $fillable = [
        'user_id',
        'curso_id',
        'lecciones_completadas',
        'total_lecciones',
        'porcentaje',
        'fecha_inicio',
        'fecha_ultimo_avance',
        'fecha_completado',
    ];

    protected function casts(): array
    {
        return [
            'lecciones_completadas' => 'integer',
            'total_lecciones' => 'integer',
            'porcentaje' => 'decimal:2',
            'fecha_inicio' => 'datetime',
            'fecha_ultimo_avance' => 'datetime',
            'fecha_completado' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }
}