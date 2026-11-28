<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recurso;
use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecursoController extends Controller
{
    public function index()
    {
        $recursos = Recurso::with(['curso', 'leccion'])->orderBy('created_at', 'desc')
        ->paginate(15);
        
        $cursos = Curso::paginate(15);
        $lecciones = Leccion::with('modulo.curso')->paginate(15); 

        return view('admin.recursos.index', compact('recursos', 'cursos', 'lecciones'));
    }

    public function store(Request $request)
    {
        // Peso máximo de 10MB y tipos permitidos
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:100'],
            'curso_id' => ['nullable', 'exists:cursos,id'],
            'leccion_id' => ['nullable', 'exists:lecciones,id'],

            // El archivo es obligatorio máximo 10MB 
            'archivo' => ['required', 'file', 'max:10240', 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar,png,jpg,jpeg,mp4,mp3'],
        ]);

        //Debe asociarse a un curso O a una lección 
        if (empty($validated['curso_id']) && empty($validated['leccion_id'])) {
            return back()->withErrors(['curso_id' => 'Debe seleccionar un curso o una lección para asociar el recurso.'])->withInput();
        }

        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            
            // Datos 
            $nombreOriginal = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getMimeType();
            $tamanoBytes = $file->getSize();

            // Generar un nombre único para el servidor para evitar colisiones
            $nombreAlmacenado = Str::random(20) . '_' . time() . '.' . $extension;

            // Guardar el archivo en storage/app/public/recursos
            $ruta = $file->storeAs('recursos', $nombreAlmacenado, 'public');

            // // Guardar en la base de datos
            // Recurso::create([
            //     'curso_id' => $validated['curso_id'],
            //     'leccion_id' => $validated['leccion_id'],
            //     'titulo' => $validated['titulo'],
            //     'tipo' => $validated['tipo'],
            //     'nombre_original' => $nombreOriginal,
            //     'nombre_almacenado' => $nombreAlmacenado,
            //     'extension' => $extension,
            //     'mime_type' => $mimeType,
            //     'tamano_bytes' => $tamanoBytes,
            //     'ruta' => $ruta,
            //     'subido_por' => auth()->id(), 
            // ]);

            return redirect()->route('admin.recursos.index')
                ->with('success', 'Recurso subido correctamente.');
        }

        return back()->withErrors(['archivo' => 'Hubo un error al subir el archivo.']);
    }

    public function destroy(Recurso $recurso)
    {
        if (Storage::disk('public')->exists($recurso->ruta)) {
            Storage::disk('public')->delete($recurso->ruta);
        }

        $recurso->delete();

        return redirect()->route('admin.recursos.index')
            ->with('success', 'Recurso eliminado correctamente.');
    }
}