<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Leccion extends Model
{
    use HasFactory;

    protected $table = 'lecciones';

    protected $fillable = [
        'modulo_id',
        'titulo',
        'tipo',
        'url_contenido',
        'contenido',
        'duracion_min',
        'orden',
        'es_preview',
    ];

    protected function casts(): array
    {
        return [
            'duracion_min' => 'integer',
            'orden' => 'integer',
            'es_preview' => 'boolean',
        ];
    }

    public function modulo(): BelongsTo
    {
        return $this->belongsTo(Modulo::class);
    }

    public function examen(): HasOne
    {
        return $this->hasOne(Examen::class, 'leccion_id');
    }

    public function ejercicioCodigo(): HasOne
    {
        return $this->hasOne(EjercicioCodigo::class, 'leccion_id');
    }
}