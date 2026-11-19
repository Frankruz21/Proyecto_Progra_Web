<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificado extends Model
{
    protected $table = 'certificados';

    protected $fillable = [
        'user_id',
        'curso_id',
        'codigo',
        'fecha_emision',
        'url_certificado',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha_emision' => 'datetime',
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