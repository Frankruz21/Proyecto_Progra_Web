<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CasoPruebaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'ejercicio_id' => $this->ejercicio_id,
            'entrada' => $this->entrada,
            'salida_esperada' => $this->salida_esperada,
            'oculto' => $this->oculto,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}