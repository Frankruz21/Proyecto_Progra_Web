<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpcionPregunta extends Model
{
    use HasFactory;

    protected $table = 'opciones_pregunta';

    protected $fillable = [
        'pregunta_id',
        'texto',
        'es_correcta',
    ];

    protected function casts(): array
    {
        return [
            'es_correcta' => 'boolean',
        ];
    }

    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(PreguntaExamen::class, 'pregunta_id');
    }
}