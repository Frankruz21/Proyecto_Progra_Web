<div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden flex flex-col h-full">
    
    <!-- Cabecera -->
    <div class="h-40 flex items-center justify-center relative" style="background-color: {{ $colorFondo }};">
        <h4 class="text-white text-xl font-bold">{{ $titulo }}</h4>
        
        <!-- Badge Categoría -->
        <span class="absolute bottom-3 left-3 px-3 py-1 text-xs font-bold text-white rounded-full" style="background-color: #A0C878;">
            {{ $categoria }}
        </span>
    </div>

    <!-- Cuerpo -->
    <div class="p-5 flex flex-col flex-grow">
        <h5 class="text-lg font-bold mb-2" style="color: #143D60;">{{ $titulo }}</h5>
        <p class="text-gray-500 text-sm mb-5 flex-grow">{{ $descripcion }}</p>
        
        <!-- Botón (Modificado para redirigir a módulos con el ID del curso) -->
        <div class="mt-auto">
            <a href="{{ route('admin.modulos.index', ['curso_id' => $cursoId]) }}" class="block w-full text-center py-2 font-bold rounded-lg transition-colors" style="background-color: #F1F5F9; color: #143D60;">
                Gestionar Curso
            </a>
        </div>
    </div>
</div>