<?php

namespace App\Http\Controllers\Aula;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function show($curso_id, $leccion_id = null)
    {
        // 1. Traemos el curso con toda su estructura
        $curso = Curso::with(['modulos.lecciones'])->findOrFail($curso_id);

        // 2. Si no se pasa una lección, tomamos la primera por defecto
        if (!$leccion_id) {
            $leccionActual = $curso->modulos->first()?->lecciones->first();
        } else {
            $leccionActual = Leccion::with('recursos')->findOrFail($leccion_id);
        }

        // 3. Si la lección no cargó recursos en el paso 2 (porque fue por defecto), los cargamos
        if ($leccionActual && !$leccionActual->relationLoaded('recursos')) {
            $leccionActual->load('recursos');
        }

        return view('admin.aula.show', compact('curso', 'leccionActual'));
    }
}