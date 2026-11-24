<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecursoApiController extends Controller
{
    public function index($leccion_id)
    {
        $recursos = Recurso::where('leccion_id', $leccion_id)->get();
        return response()->json($recursos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'leccion_id' => 'required|exists:lecciones,id',
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string',
            // Validación de archivo maximos 10MB y los tipos permitidos
            'archivo' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,ppt,txt,pptx,zip,rar,png,jpg,jpeg',
        ]);

        $file = $request->file('archivo');
        $nombreOriginal = $file->getClientOriginalName();
        $nombreAlmacenado = Str::random(20) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $ruta = $file->storeAs('recursos', $nombreAlmacenado, 'public');

        $leccion = \App\Models\Leccion::findOrFail($request->leccion_id);
        $cursoId = $leccion->modulo->curso_id;

        $recurso = Recurso::create([
            'curso_id' => $cursoId,
            'leccion_id' => $request->leccion_id,
            'titulo' => $request->titulo,
            'tipo' => $request->tipo,
            'nombre_original' => $nombreOriginal,
            'nombre_almacenado' => $nombreAlmacenado,
            'extension' => $file->getClientOriginalExtension(),
            'mime_type' => $file->getMimeType(),
            'tamano_bytes' => $file->getSize(),
            'ruta' => $ruta,
            'subido_por' => auth()->id() ?? 1,
        ]);

        return response()->json(['success' => true, 'recurso' => $recurso]);
    }

    public function destroy($id)
    {
        $recurso = Recurso::findOrFail($id);
        
        if (Storage::disk('public')->exists($recurso->ruta)) {
            Storage::disk('public')->delete($recurso->ruta);
        }
        
        $recurso->delete();

        return response()->json(['success' => true]);
    }
}