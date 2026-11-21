<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use App\Models\Curso;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index()
    {
        $modulos = Modulo::with('curso')->orderBy('orden')->get();
        $cursos = Curso::all(); // <-- Asegúrate de tener esto
        return view('admin.modulos.index', compact('modulos', 'cursos'));
    }

    public function create()
    {
        $cursos = Curso::all(); 
        return view('admin.modulos.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'curso_id' => ['required', 'exists:cursos,id'],
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'orden' => ['required', 'integer', 'min:1'],
        ]);

        Modulo::create($validated);

        return redirect()->route('admin.modulos.index')
            ->with('success', 'Módulo creado correctamente.');
    }

    public function edit(Modulo $modulo)
    {
        $cursos = Curso::all();
        return view('admin.modulos.edit', compact('modulo', 'cursos'));
    }

    public function update(Request $request, Modulo $modulo)
    {
        $validated = $request->validate([
            'curso_id' => ['required', 'exists:cursos,id'],
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'orden' => ['required', 'integer', 'min:1'],
        ]);

        $modulo->update($validated);

        return redirect()->route('admin.modulos.index')
            ->with('success', 'Módulo actualizado correctamente.');
    }

    public function destroy(Modulo $modulo)
    {
        $modulo->delete();
        return redirect()->route('admin.modulos.index')
            ->with('success', 'Módulo eliminado correctamente.');
    }

    public function contenido(Modulo $modulo)
    {
        // Cargamos las lecciones y recursos de ESTE módulo
        $lecciones = $modulo->lecciones()->orderBy('orden')->get();
        $recursos = \App\Models\Recurso::where('curso_id', $modulo->curso_id)->get(); 

        // Retornamos SOLO el HTML, sin el layout (sin @extends)
        return view('admin.modulos.contenido', compact('modulo', 'lecciones', 'recursos'));
    }
}