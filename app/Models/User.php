<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email',
        'password',
        'telefono',
        'fotografia',
        'activo',
        'rol_id'
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'activo'=> 'boolean'
        ];
    }

    /* protected function nombreCompleto(): Attribute
    {
        return Attribute::make(
            get: fn () => collect([
                $this->primer_nombre,
                $this->segundo_nombre,
                $this->primer_apellido,
                $this->segundo_apellido,
            ])->filter()->implode(' ')
        );
    } */

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function tieneRol(string ...$roles): bool
    {
        return in_array($this->rol?->nombre, $roles, true);
    }

    public function rutaInicio(): string
    {
        return match ($this->rol?->nombre) {
            'Administrador', 'Gestor Académico' => route('admin.dashboard'),
            'Instructor' => route('admin.cursos.instructor'),
            default => route('student.dashboard'),
        };
    }

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class);
    }
    
    public function progresos(): HasMany
    {
        return $this->hasMany(Progreso::class);
    }

    public function certificados(): HasMany
    {
        return $this->hasMany(Certificado::class);
    }

    public function perfilInstructor()
    {
        return $this->hasOne(Perfil_Instructor::class, 'user_id');
    }
}
