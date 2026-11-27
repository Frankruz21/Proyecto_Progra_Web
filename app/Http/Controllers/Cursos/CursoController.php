<?php

namespace App\Http\Controllers\Cursos;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    public function index()
    {
        // $cursos = Curso::where('instructor_id', Auth::id())->orderByDesc('created_at')->paginate(15);
        $cursos = Curso::orderByDesc('created_at')->paginate(15);

        return view('admin.cursos.index', compact('cursos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion_corta' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'requisitos' => 'required|string',
            'objetivos' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'duracion_horas' => 'required|numeric|min:0',
            'portada' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'video_intro_url' => 'nullable|url',
            'categoria_id' => 'required|exists:categorias,id',
            'nivel_id' => 'required|exists:niveles,id',
            'idioma_id' => 'required|exists:idiomas,id',
            'es_programacion' => 'nullable|boolean',
        ]);

        //Generar el Slug 
        $validated['slug'] = Str::slug($request->titulo) . '-' . Str::random(5);
        
        // Guarda foto en en storage/app/public/portadas
        if ($request->hasFile('portada')) {
            $rutaPortada = $request->file('portada')->store('portadas', 'public');
            $validated['portada'] = $rutaPortada;
        }

        $validated['instructor_id'] = Auth::id(); 
        $validated['es_programacion'] = $request->has('es_programacion') ? true : false;

        Curso::create($validated);

        return redirect()->back()->with('success', '¡Curso creado exitosamente!');
    }
}