<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Examen extends Model
{
    use HasFactory;

    protected $table = 'examenes';

    protected $fillable = [
        'leccion_id',
        'titulo',
        'puntaje_minimo',
        'intentos_max',
        'duracion_min',
    ];

    protected function casts(): array
    {
        return [
            'puntaje_minimo' => 'decimal:2',
            'intentos_max' => 'integer',
            'duracion_min' => 'integer',
        ];
    }

    public function leccion(): BelongsTo
    {
        return $this->belongsTo(Leccion::class, 'leccion_id');
    }

    public function preguntas(): HasMany
    {
        return $this->hasMany(PreguntaExamen::class, 'examen_id');
    }

    public function intentos(): HasMany
    {
        return $this->hasMany(IntentoExamen::class, 'examen_id');
    }
}