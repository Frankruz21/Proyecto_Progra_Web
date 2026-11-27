<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use App\Models\Curso;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index(Request $request)
    {
        $query = Modulo::with('curso')->orderBy('orden');

        //filtramos los módulos de ese curso
        if ($request->filled('curso_id')) {
            $query->where('curso_id', $request->curso_id);
        }
        $modulos = $query->paginate(15);
        $cursos = Curso::paginate(15); 
        $cursoSeleccionado = $request->filled('curso_id') ? Curso::find($request->curso_id) : null;

        return view('admin.modulos.index', compact('modulos', 'cursos', 'cursoSeleccionado'));
    }

    public function create()
    {
        $cursos = Curso::paginate(15); 
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

        return redirect()->route('admin.modulos.index', ['curso_id' => $validated['curso_id']])
            ->with('success', 'Módulo creado correctamente.');
    }

    public function edit(Modulo $modulo)
    {
        $cursos = Curso::paginate(15);
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

        return redirect()->route('admin.modulos.index', ['curso_id' => $validated['curso_id']])
            ->with('success', 'Módulo creado correctamente.');
    }

    public function destroy(Modulo $modulo)
    {
        $cursoId = $modulo->curso_id; //para el curos actual

        $modulo->delete();
        return redirect()->route('admin.modulos.index', ['curso_id' => $cursoId])
            ->with('success', 'Módulo eliminado.');
    }

    public function contenido(Modulo $modulo)
    {
        // Cargamos las lecciones y recursos del modulo selecciodo
        $lecciones = $modulo->lecciones()->orderBy('orden')->get();
        $recursos = \App\Models\Recurso::where('curso_id', $modulo->curso_id)->get(); 

        // Retornamos SOLO el HTML, sin el layout (sin @extends)
        return view('admin.modulos.contenido', compact('modulo', 'lecciones', 'recursos'));
    }

    public function toggle(Request $request, Modulo $modulo)
    {
        $modulo->update(['activo' => $request->boolean('activo')]);
        return response()->json(['activo' => $modulo->activo]);
    }
}