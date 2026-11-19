<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RespuestaIntento extends Model
{
    use HasFactory;

    protected $table = 'respuestas_intento';

    protected $fillable = [
        'intento_id',
        'pregunta_id',
    ];

    public function intento(): BelongsTo
    {
        return $this->belongsTo(IntentoExamen::class, 'intento_id');
    }

    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(PreguntaExamen::class, 'pregunta_id');
    }

    public function opciones(): BelongsToMany
    {
        return $this->belongsToMany(
            OpcionPregunta::class,
            'respuesta_opciones',
            'respuesta_id',
            'opcion_id'
        )->withTimestamps();
    }
}