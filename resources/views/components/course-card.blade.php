<div class="group relative flex flex-col h-72 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer"
     style="background-color: {{ $colorFondo }};">

    {{-- Imagen opcional de fondo --}}
    @if(!empty($imagen))
        <img src="{{ $imagen }}" alt="{{ $titulo }}"
             class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:opacity-90 group-hover:scale-105 transition-all duration-500">
    @endif

    {{-- Degradado para legibilidad --}}
    <div class="absolute inset-0 bg-gradient-to-t from-[#143D60]/90 via-[#143D60]/30 to-transparent"></div>

    {{-- Contenido --}}
    <div class="relative flex flex-col h-full p-6 text-white">
        <span class="text-xs font-semibold uppercase tracking-wider" style="color: #5FA8F5;">
            {{ $categoria }}
        </span>

        <h4 class="mt-2 text-xl font-bold leading-snug line-clamp-2">{{ $titulo }}</h4>
        <p class="mt-2 text-sm text-white/70 line-clamp-2">{{ $descripcion }}</p>

        {{-- Botón play (estilo segunda imagen) --}}
        <div class="mt-auto flex items-end justify-between">
            <a href="{{ route('admin.modulos.index', ['curso_id' => $cursoId]) }}"
               class="w-14 h-14 flex items-center justify-center rounded-full bg-white shadow-lg hover:scale-110 transition-transform"
               style="color: #2563EB;"
               aria-label="Ver curso">
                <svg class="w-6 h-6 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </a>
        </div>
    </div>
</div>