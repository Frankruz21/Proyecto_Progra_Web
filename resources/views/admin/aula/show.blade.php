@extends('layouts.aula')

@section('title', 'Vista Previa del Aula')

@section('content')
<div class="min-h-screen bg-[#14141e] text-white p-6 rounded-4" style="font-family: 'Poppins', sans-serif;">
    
    <!-- Barra Superior -->
    <div class="flex justify-between items-center mb-8">
        <div class="flex gap-4">
            <div class="bg-white/10 px-4 py-2 rounded-full flex items-center gap-2 text-sm text-gray-300 w-64">
                <i class="bi bi-search"></i> Search courses
            </div>
        </div>
        <div class="flex gap-6 text-sm font-medium text-gray-400">
            <a href="#" class="text-white border-b-2 border-white pb-1">Course</a>
            <a href="#" class="hover:text-white transition">Education</a>
            <a href="#" class="hover:text-white transition">Creative</a>
            <a href="#" class="hover:text-white transition">Think</a>
            <a href="#" class="hover:text-white transition">Short</a>
        </div>
        <div class="flex items-center gap-4">
            <i class="bi bi-bell text-gray-400 text-lg"></i>
            <div class="flex items-center gap-2 bg-white/10 px-1 py-1 rounded-full pr-3">
                <div class="w-8 h-8 rounded-full bg-white text-black flex items-center justify-center font-bold text-xs">AD</div>
                <span class="text-xs">{{ Auth::user()->primer_nombre ?? 'Admin' }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- COLUMNA IZQUIERDA -->
        <div class="lg:col-span-3 space-y-6">
            
            <!-- New Course (Módulos con Scroll) -->
            <div class="bg-white/5 rounded-3xl p-5 border border-white/10 flex flex-col max-h-[350px]">
                <div class="flex justify-between items-center mb-4 flex-shrink-0">
                    <h2 class="text-white font-bold text-2xl leading-tight">New<br>Course</h2>
                    <span class="text-[10px] text-gray-400 text-right leading-tight">Sort by<br>Today</span>
                </div>
                
                <!-- Contenedor con scroll -->
                <div class="space-y-4 overflow-y-auto pr-2 custom-scrollbar">
                    @foreach($curso->modulos as $modulo)
                        <div class="relative group">
                            <!-- Enlace a la primera lección del módulo (o al módulo si no tiene) -->
                            <a href="{{ route('admin.aula.show', ['curso_id' => $curso->id, 'leccion_id' => $modulo->lecciones->first()->id ?? '']) }}">
                                <x-atomics.module-card 
                                    titulo="{{ $modulo->titulo }}" 
                                    imagen="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                                />
                            </a>
                            
                            <!-- Botón editar -->
                            @if(in_array(Auth::user()->rol->nombre ?? '', ['admin', 'instructor']))
                                <a href="{{ route('admin.modulos.edit', $modulo->id) }}" 
                                class="absolute top-2 right-2 bg-black/50 hover:bg-black/80 backdrop-blur-md p-2 rounded-full text-white transition z-10">
                                    <i class="bi bi-pencil-square text-sm"></i>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Continue Progress (Lecciones del Módulo Actual con Scroll) -->
            <div class="bg-white/5 rounded-3xl p-5 border border-white/10 flex flex-col max-h-[350px]">
                <h2 class="text-white font-bold text-2xl mb-4 leading-tight flex-shrink-0">Continue<br>Progress</h2>
                
                <!-- Contenedor con scroll -->
                <div class="space-y-3 overflow-y-auto pr-2 custom-scrollbar">
                    {{-- FILTRAMOS: Solo mostramos las lecciones del módulo actual --}}
                    @php
                        // Obtenemos el módulo de la lección actual
                        $moduloActual = $leccionActual ? $leccionActual->modulo : $curso->modulos->first();
                        $leccionesAMostrar = $moduloActual ? $moduloActual->lecciones : collect();
                    @endphp

                    @foreach($leccionesAMostrar as $leccion)
                        <div class="relative group">
                            <!-- Envolvemos con un enlace -->
                            <a href="{{ route('admin.aula.show', ['curso_id' => $curso->id, 'leccion_id' => $leccion->id]) }}">
                                <x-atomics.lesson-card 
                                    titulo="{{ $leccion->titulo }}" 
                                    progreso="{{ $leccion->duracion_min ?? 0 }} min"
                                />
                            </a>
                            <!-- ... botón editar ... -->
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- COLUMNA DERECHA -->
        <div class="lg:col-span-9 space-y-6">
            
            <!-- Video Player -->
            <div class="relative">
                <x-atomics.video-player 
                    titulo="{{ $leccionActual->titulo ?? 'Selecciona una lección' }}" 
                    descripcion="{{ $curso->descripcion_corta }}" 
                    categoria="{{ $curso->categoria->nombre ?? 'Curso' }}"
                    imagenFondo="{{ asset('storage/' . $curso->portada) }}"
                    urlVideo="{{ $leccionActual->url_contenido ?? null }}"
                />

                @if($leccionActual && in_array(Auth::user()->rol->nombre ?? '', ['admin', 'instructor']))
                    <a href="{{ route('admin.lecciones.edit', $leccionActual->id) }}" 
                       class="absolute top-6 right-6 bg-white/20 hover:bg-white/40 backdrop-blur-md px-4 py-2 rounded-full text-white text-sm font-semibold transition flex items-center gap-2">
                        <i class="bi bi-pencil-square"></i> Editar Lección
                    </a>
                @endif
            </div>

            <!-- You Might Like (Scroll Horizontal) -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-white font-bold text-2xl">You might like</h2>
                    <button class="text-xs text-gray-400 hover:text-white transition">See all</button>
                </div>
                
                <!-- Contenedor con Scroll Horizontal -->
                <div class="flex gap-4 overflow-x-auto pb-4 custom-scrollbar flex-nowrap">
                    {{-- Iteramos las lecciones del curso --}}
                    @foreach($curso->modulos->flatMap->lecciones as $leccion)
                        <div class="relative group flex-shrink-0" style="width: 200px;"> {{-- Ancho fijo para cada tarjeta --}}
                            <a href="{{ route('admin.aula.show', ['curso_id' => $curso->id, 'leccion_id' => $leccion->id]) }}">
                                <x-atomics.module-card 
                                    titulo="{{ $leccion->titulo }}" 
                                    imagen="https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                                    :esGrande="true"
                                />
                            </a>
                            
                            @if(in_array(Auth::user()->rol->nombre ?? '', ['admin', 'instructor']))
                                <a href="{{ route('admin.lecciones.edit', $leccion->id) }}" 
                                class="absolute top-2 right-2 bg-black/50 hover:bg-black/80 p-2 rounded-full text-white transition z-10"
                                title="Editar Lección">
                                    <i class="bi bi-pencil-square text-sm"></i>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Recursos -->
            @if($leccionActual && $leccionActual->recursos->count() > 0)
                <div class="bg-white/5 rounded-3xl p-6 border border-white/10 mt-6">
                    <h3 class="text-white font-bold text-xl mb-4">Recursos de esta lección</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach($leccionActual->recursos as $recurso)
                            <x-atomics.resource-download 
                                titulo="{{ $recurso->titulo }}" 
                                ruta="{{ $recurso->ruta }}" 
                                tipo="{{ strtoupper($recurso->extension) }}" 
                                peso="{{ round($recurso->tamano_bytes / 1024 / 1024, 2) }} MB"
                            />
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Estilo para que el scrollbar se vea oscuro y elegante */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: rgba(255, 255, 255, 0.4);
    }
</style>
@endpush