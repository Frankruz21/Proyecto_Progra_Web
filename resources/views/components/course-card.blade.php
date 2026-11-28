@props([
    'titulo' => 'Sin título',
    'descripcion' => null,
    'categoria' => 'General',
    'colorFondo' => '#143D60',
    'cursoId' => null,
    'curso' => null,
    'imagen' => null,
    'instructor' => null,
    'estado' => 'En progreso',
    'progreso' => 0,
    'duracionHoras' => null,
    'ruta' => null,
    'textoBoton' => 'Continuar aprendiendo',
    'mostrarCategoria' => false,
    'mostrarEstado' => false,
    'mostrarProgreso' => false,
    'mostrarInstructor' => false,
])

@php
    $idCurso = $cursoId ?? $curso?->id;
    $imagenCurso = $imagen ?? (!empty($curso?->portada) ? asset('storage/' . $curso->portada) : null);
    $nombreInstructor = $instructor
        ?? $curso?->instructor?->user?->name
        ?? $curso?->instructor?->nombre
        ?? 'Instructor del curso';
    $horasCurso = $duracionHoras ?? $curso?->duracion_horas ?? 0;
    $urlDestino = $ruta ?? route('admin.modulos.index', ['curso_id' => $idCurso]);
    $porcentaje = max(0, min(100, (int) $progreso));
@endphp

<div class="group flex flex-col rounded-2xl bg-white overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100">

    {{-- Cabecera superior con degradado / imagen opcional --}}
    <div class="relative p-6 text-white overflow-hidden min-h-[195px] flex flex-col justify-between"
         style="background: linear-gradient(135deg, {{ $colorFondo }} 0%, #245B7A 100%);">

        @if(!empty($imagenCurso))
            <img src="{{ $imagenCurso }}" alt="{{ $titulo }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-25 group-hover:scale-105 transition-transform duration-500">
        @endif

        <div class="pointer-events-none absolute -top-10 -right-10 w-44 h-44 rounded-full bg-white/10"></div>
        <div class="pointer-events-none absolute -bottom-12 right-24 w-32 h-32 rounded-full bg-white/5"></div>

        <div class="relative z-10">
            @if($mostrarCategoria)
                <span class="text-xs font-bold uppercase tracking-wider text-slate-200">
                    {{ $categoria }}
                </span>
            @endif

            <div class="{{ $mostrarCategoria ? 'mt-4' : '' }} text-white/90">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                </svg>
            </div>
        </div>

        <div class="relative z-10 mt-3 flex items-end justify-between gap-4">
            <h4 class="text-xl font-bold leading-snug line-clamp-2 {{ $mostrarEstado ? 'max-w-[65%]' : 'w-full' }}">
                {{ $titulo }}
            </h4>

            @if($mostrarEstado)
                <span class="shrink-0 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white text-[#0F385A] text-xs font-semibold shadow-sm">
                    <svg class="w-4 h-4 text-[#1E5673]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" />
                        <path fill="currentColor" stroke="none" d="M10.5 8.5v7l5.5-3.5-5.5-3.5z" />
                    </svg>
                    {{ $estado }}
                </span>
            @endif
        </div>
    </div>

    {{-- Cuerpo inferior blanco --}}
    <div class="flex flex-col flex-1 p-6 bg-white">

        @if($mostrarInstructor)
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-[#EEF3F7] flex items-center justify-center text-[#1E5673] shrink-0">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>
                <span class="text-sm text-slate-600 font-medium">
                    {{ $nombreInstructor }}
                </span>
            </div>
        @endif

        @if(!empty($descripcion))
            <p class="mt-3 text-xs text-slate-500 line-clamp-2">
                {{ $descripcion }}
            </p>
        @endif

        @if($mostrarProgreso)
            <div class="mt-5">
                <div class="flex items-center justify-between text-sm mb-2">
                    <span class="text-slate-500">Progreso del curso</span>
                    <span class="font-bold text-slate-800">{{ $porcentaje }}%</span>
                </div>
                <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full rounded-full bg-[#1E5B74] transition-all duration-500"
                         style="width: {{ $porcentaje }}%;"></div>
                </div>
            </div>
        @endif

        <div class="mt-4 flex items-center justify-end text-xs text-slate-500">
            <div class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>{{ $horasCurso }} {{ $horasCurso == 1 ? 'hora' : 'horas' }}</span>
            </div>
        </div>

        <a href="{{ $urlDestino }}"
           style="text-decoration: none;"
           class="mt-6 w-full flex items-center justify-between px-5 py-3.5 rounded-xl bg-[#0D3559] hover:bg-[#134673] text-white no-underline hover:no-underline text-sm font-semibold transition-colors">
            <span>{{ $textoBoton }}</span>
            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>
</div>