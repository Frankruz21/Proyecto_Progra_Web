<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IntentoExamen extends Model
{
    use HasFactory;

    protected $table = 'intentos_examen';

    protected $fillable = [
        'examen_id',
        'user_id',
        'numero_intento',
        'estado',
        'puntaje',
        'aprobado',
        'fecha_inicio',
        'fecha_fin',
    ];

    protected function casts(): array
    {
        return [
            'numero_intento' => 'integer',
            'puntaje' => 'decimal:2',
            'aprobado' => 'boolean',
            'fecha_inicio' => 'datetime',
            'fecha_fin' => 'datetime',
        ];
    }

    public function examen(): BelongsTo
    {
        return $this->belongsTo(Examen::class, 'examen_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function respuestas(): HasMany
    {
        return $this->hasMany(RespuestaIntento::class, 'intento_id');
    }
}