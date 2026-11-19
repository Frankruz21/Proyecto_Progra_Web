<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PreguntaExamen extends Model
{
    use HasFactory;

    protected $table = 'preguntas_examen';

    protected $fillable = [
        'examen_id',
        'enunciado',
        'tipo',
        'puntaje',
    ];

    protected function casts(): array
    {
        return [
            'puntaje' => 'decimal:2',
        ];
    }

    public function examen(): BelongsTo
    {
        return $this->belongsTo(Examen::class, 'examen_id');
    }

    public function opciones(): HasMany
    {
        return $this->hasMany(OpcionPregunta::class, 'pregunta_id');
    }
}