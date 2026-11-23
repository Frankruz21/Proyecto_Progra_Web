<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leccion;
use App\Models\Modulo;
use Illuminate\Http\Request;

class LeccionController extends Controller
{
    public function index(Request $request)
    {
        $query = Leccion::with('modulo.curso')->orderBy('orden');

        if ($request->filled('modulo_id')) {
            $query->where('modulo_id', $request->modulo_id);
        }

        $lecciones = $query->get();
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

        $modulo = Modulo::find($validated['modulo_id']);
        return redirect()->route('admin.modulos.index', ['curso_id' => $modulo->curso_id])
            ->with('success', 'Lección creada correctamente.');
    }

    public function edit(Leccion $leccion)
    {
        $modulos = Modulo::all();
        return redirect()->route('admin.lecciones.index', ['editar_leccion' => $leccion->id]);
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

        $modulo = Modulo::find($validated['modulo_id']);
        return redirect()->route('admin.modulos.index', ['curso_id' => $modulo->curso_id])
            ->with('success', 'Lección actualizada correctamente.');
    }

    public function destroy(Leccion $leccion)
    {
        $leccion->delete();

        // Si la petición viene de AJAX, devolvemos JSON. Si es normal, redirigimos.
        if (request()->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Lección eliminada.');
    }
}