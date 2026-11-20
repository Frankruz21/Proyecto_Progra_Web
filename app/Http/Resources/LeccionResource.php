<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeccionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'modulo_id' => $this->modulo_id,
            'titulo' => $this->titulo,
            'tipo' => $this->tipo,
            'url_contenido' => $this->url_contenido,
            'contenido' => $this->contenido,
            'duracion_min' => $this->duracion_min,
            'orden' => $this->orden,
            'es_preview' => $this->es_preview,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}