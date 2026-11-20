<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matricula extends Model
{
    protected $fillable = [
        'user_id',
        'curso_id',
        'fecha_matricula',
        'estado',
        'fecha_finalizacion',
    ];

    protected function casts(): array
    {
        return [
            'fecha_matricula' => 'datetime',
            'fecha_finalizacion' => 'datetime',
        ];
    }

    // Una matrícula pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Una matrícula pertenece a un curso
    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }
}