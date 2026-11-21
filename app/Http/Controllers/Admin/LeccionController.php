<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leccion;
use App\Models\Modulo;
use Illuminate\Http\Request;

class LeccionController extends Controller
{
    public function index()
    {
        $lecciones = Leccion::with('modulo')->orderBy('modulo_id')->orderBy('orden')->get();
        $modulos = Modulo::with('curso')->get(); 

        return view('admin.lecciones.index', compact('lecciones', 'modulos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'modulo_id' => ['required', 'exists:modulos,id'],
            'titulo' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'in:video,lectura,examen,taller,codigo'],
            'url_contenido' => ['nullable', 'string', 'max:2048'],
            'contenido' => ['nullable', 'string'],
            'duracion_min' => ['nullable', 'integer', 'min:0'],
            'orden' => ['required', 'integer', 'min:1'],
            'es_preview' => ['nullable', 'boolean'],
        ]);

        $validated['es_preview'] = $request->has('es_preview') ? true : false;

        Leccion::create($validated);

        return redirect()->route('admin.lecciones.index')
            ->with('success', 'Lección creada correctamente.');
    }

    public function edit(Leccion $leccion)
    {
        $modulos = Modulo::all();
        return view('admin.lecciones.edit', compact('leccion', 'modulos'));
    }

    public function update(Request $request, Leccion $leccion)
    {
        $validated = $request->validate([
            'modulo_id' => ['required', 'exists:modulos,id'],
            'titulo' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'in:video,lectura,examen,taller,codigo'],
            'url_contenido' => ['nullable', 'string', 'max:2048'],
            'contenido' => ['nullable', 'string'],
            'duracion_min' => ['nullable', 'integer', 'min:0'],
            'orden' => ['required', 'integer', 'min:1'],
            'es_preview' => ['nullable', 'boolean'],
        ]);

        $validated['es_preview'] = $request->has('es_preview') ? true : false;

        $leccion->update($validated);

        return redirect()->route('admin.lecciones.index')
            ->with('success', 'Lección actualizada correctamente.');
    }

    public function destroy(Leccion $leccion)
    {
        $leccion->delete();
        return redirect()->route('admin.lecciones.index')
            ->with('success', 'Lección eliminada correctamente.');
    }
}