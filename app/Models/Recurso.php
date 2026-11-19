<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recurso extends Model
{
    use HasFactory;

    protected $table = 'recursos';

    protected $fillable = [
        'curso_id',
        'leccion_id',
        'titulo',
        'tipo',
        'nombre_original',
        'nombre_almacenado',
        'extension',
        'mime_type',
        'tamano_bytes',
        'ruta',
        'subido_por',
    ];

    protected function casts(): array
    {
        return [
            'tamano_bytes' => 'integer',
        ];
    }

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function leccion(): BelongsTo
    {
        return $this->belongsTo(Leccion::class, 'leccion_id');
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'subido_por');
    }
}