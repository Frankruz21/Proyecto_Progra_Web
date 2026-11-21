<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LeccionResource;
use App\Models\Leccion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LeccionController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Leccion::query()->orderBy('orden');

        if ($request->filled('modulo_id')) {
            $query->where('modulo_id', $request->integer('modulo_id'));
        }

        return LeccionResource::collection($query->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'modulo_id' => ['required', 'integer', 'exists:modulos,id'],
            'titulo' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'in:video,lectura,examen,taller,codigo'],
            'url_contenido' => ['nullable', 'string', 'max:2048'],
            'contenido' => ['nullable', 'string'],
            'duracion_min' => ['nullable', 'integer', 'min:0'],
            'orden' => ['nullable', 'integer', 'min:0'],
            'es_preview' => ['nullable', 'boolean'],
        ]);

        $leccion = Leccion::create($validated);

        return (new LeccionResource($leccion))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Leccion $leccion): LeccionResource
    {
        return new LeccionResource($leccion);
    }

    public function update(Request $request, Leccion $leccion): LeccionResource
    {
        $validated = $request->validate([
            'modulo_id' => ['sometimes', 'integer', 'exists:modulos,id'],
            'titulo' => ['sometimes', 'string', 'max:255'],
            'tipo' => ['sometimes', 'string', 'in:video,lectura,examen,taller,codigo'],
            'url_contenido' => ['nullable', 'string', 'max:2048'],
            'contenido' => ['nullable', 'string'],
            'duracion_min' => ['nullable', 'integer', 'min:0'],
            'orden' => ['nullable', 'integer', 'min:0'],
            'es_preview' => ['nullable', 'boolean'],
        ]);

        $leccion->update($validated);

        return new LeccionResource($leccion->fresh());
    }

    public function destroy(Leccion $leccion): JsonResponse
    {
        $leccion->delete();

        return response()->json([
            'message' => 'Lección eliminada correctamente.',
        ]);
    }
}