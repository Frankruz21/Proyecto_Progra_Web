<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perfil_Instructor extends Model
{
    use HasFactory;

    protected $table = 'perfil_instructores';

    protected $fillable = [
        'user_id',
        'especialidad',
        'biografia',
        'experiencia_anos',
        'sitio_web',
        'linkedin',
        'verificado',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'experiencia_anos' => 'integer',
            'verificado' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class, 'instructor_id');
    }

    public static function obtenerOCrearParaUsuario(int $userId, array $defaults = []): self
    {
        return static::firstOrCreate(
            ['user_id' => $userId],
            $defaults
        );
    }
}