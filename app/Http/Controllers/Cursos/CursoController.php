<?php

namespace App\Http\Controllers\Cursos;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Perfil_Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CursoController extends Controller
{
    private function obtenerPerfilInstructorId(): ?int
    {
        $user = Auth::user();

        if (! $user) {
            return null;
        }

        // return $user->perfilInstructor?->id;
        return Perfil_Instructor::where('user_id', $user->id)->value('id');
    }

    public function index()
    {
        $instructorId = $this->obtenerPerfilInstructorId();

        $cursos = $instructorId
            ? Curso::where('instructor_id', $instructorId)->paginate(15)
            : collect();

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

        $instructorId = $this->obtenerPerfilInstructorId();

        if (! $instructorId) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['instructor_id' => 'Tu usuario no tiene un perfil de instructor registrado']);
        }

        // Generar el Slug
        $validated['slug'] = Str::slug($request->titulo) . '-' . Str::random(5);

        // Guarda foto en storage/app/public/portadas
        if ($request->hasFile('portada')) {
            $rutaPortada = $request->file('portada')->store('portadas', 'public');
            $validated['portada'] = $rutaPortada;
        }

        $validated['instructor_id'] = $instructorId;
        $validated['es_programacion'] = $request->has('es_programacion');

        Curso::create($validated);

        return redirect()->back()->with('success', '¡Curso creado exitosamente!');
    }
}