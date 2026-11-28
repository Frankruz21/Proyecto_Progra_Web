<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecursoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'tipo' => $this->tipo,
            'url' => $this->url,
            'curso_id' => $this->curso_id,
            'leccion_id' => $this->leccion_id,
            'curso' => $this->whenLoaded('curso', fn () => [
                'id' => $this->curso->id,
                'titulo' => $this->curso->titulo,
            ]),
            'leccion' => $this->whenLoaded('leccion', fn () => [
                'id' => $this->leccion->id,
                'titulo' => $this->leccion->titulo,
            ]),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}