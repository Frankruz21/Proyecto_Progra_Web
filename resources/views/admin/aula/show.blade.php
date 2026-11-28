@extends('layouts.aula')

@section('title', 'Vista Previa del Aula')

@section('content')
<div class="min-h-screen bg-[#f4f7fb] text-slate-800 p-6 rounded-3xl" style="font-family: 'Poppins', sans-serif;">

    <!-- Encabezado y resumen estilo panel -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wider text-indigo-600">Vista Previa del Aula</p>
            <h1 class="text-2xl font-bold text-slate-900">{{ $curso->titulo ?? 'Curso' }}</h1>
        </div>

        <div class="flex items-center gap-3 self-start md:self-auto">
            <a href="{{ url()->previous() }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 text-sm font-medium transition shadow-xs">
                <i class="bi bi-arrow-left"></i>
                <span>Volver</span>
            </a>

            <div class="flex items-center gap-2 bg-white border border-slate-200 px-2 py-1.5 rounded-full pr-3 shadow-xs">
                <div class="w-7 h-7 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold text-xs">
                    {{ strtoupper(substr(Auth::user()->primer_nombre ?? 'AD', 0, 2)) }}
                </div>
                <span class="text-xs font-medium text-slate-700">{{ Auth::user()->primer_nombre ?? 'Admin' }}</span>
            </div>
        </div>
    </div>

    <!-- Tarjetas superiores de métricas (alineadas con el estilo de tus vistas) -->
    @php
        $modulosActivos = $curso->modulos->filter(fn ($m) => (bool) $m->activo);
        $totalLecciones = $modulosActivos->flatMap->lecciones->count();
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <div class="rounded-3xl p-5 text-white bg-gradient-to-br from-[#0f3d5e] to-[#1d5fa7] shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-white/80">Total Módulos</p>
            <p class="text-3xl font-bold mt-1">{{ $modulosActivos->count() }}</p>
            <p class="text-xs text-white/80 mt-4">Módulos activos en este curso</p>
        </div>

        <div class="rounded-3xl p-5 text-white bg-gradient-to-br from-[#134e6f] to-[#2563eb] shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-white/80">Lecciones</p>
            <p class="text-3xl font-bold mt-1">{{ $totalLecciones }}</p>
            <p class="text-xs text-white/80 mt-4">Lecciones disponibles</p>
        </div>

        <div class="rounded-3xl p-5 text-white bg-gradient-to-br from-[#97c46b] to-[#4f86c6] shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-white/90">Curso Actual</p>
            <p class="text-xl font-bold mt-1 leading-snug line-clamp-2">{{ $curso->titulo ?? 'Curso' }}</p>
            <p class="text-xs text-white/85 mt-3">{{ $curso->categoria->nombre ?? 'General' }}</p>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- COLUMNA IZQUIERDA -->
        <div class="lg:col-span-3 space-y-6">

            <!-- Módulos con scroll -->
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs flex flex-col max-h-[360px]">
                <div class="flex justify-between items-center mb-4 flex-shrink-0">
                    <h2 class="text-slate-900 font-bold text-lg">Módulos</h2>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-indigo-50 text-indigo-600">
                        {{ $modulosActivos->count() }}
                    </span>
                </div>

                <div class="space-y-3 overflow-y-auto pr-1 custom-scrollbar">
                    @foreach($modulosActivos as $modulo)
                        <div class="relative group rounded-2xl border border-slate-100 hover:border-indigo-200 transition">
                            <a href="{{ route('admin.aula.show', ['curso_id' => $curso->id, 'leccion_id' => $modulo->lecciones->first()->id ?? '']) }}">
                                <x-atomics.module-card
                                    titulo="{{ $modulo->titulo }}"
                                    imagen="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                                />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Lecciones del módulo actual -->
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs flex flex-col max-h-[360px]">
                <h2 class="text-slate-900 font-bold text-lg mb-4 flex-shrink-0">Lecciones por Módulo</h2>

                <div class="space-y-3 overflow-y-auto pr-1 custom-scrollbar">
                    @php
                        $moduloActual = $leccionActual ? $leccionActual->modulo : $curso->modulos->first();
                        $leccionesAMostrar = $moduloActual ? $moduloActual->lecciones : collect();
                    @endphp

                    @foreach($leccionesAMostrar as $leccion)
                        <div class="relative group rounded-2xl border border-slate-100 hover:border-indigo-200 transition">
                            <a href="{{ route('admin.aula.show', ['curso_id' => $curso->id, 'leccion_id' => $leccion->id]) }}">
                                <x-atomics.lesson-card
                                    titulo="{{ $leccion->titulo }}"
                                    progreso="{{ $leccion->duracion_min ?? 0 }} min"
                                />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- COLUMNA DERECHA -->
        <div class="lg:col-span-9 space-y-6">

            <!-- Video Player -->
            <div class="bg-white rounded-3xl p-4 border border-slate-200/80 shadow-xs">
                <x-atomics.video-player
                    titulo="{{ $leccionActual->titulo ?? 'Selecciona una lección' }}"
                    descripcion="{{ $curso->descripcion_corta }}"
                    categoria="{{ $curso->categoria->nombre ?? 'Curso' }}"
                    imagenFondo="{{ asset('storage/' . $curso->portada) }}"
                    urlVideo="{{ $leccionActual->url_contenido ?? null }}"
                />
            </div>

            <!-- Todas las lecciones -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-slate-900 font-bold text-lg">Todas las Lecciones</h2>
                    <span class="text-xs text-slate-500">{{ $totalLecciones }} lecciones</span>
                </div>

                <div class="flex gap-4 overflow-x-auto pb-3 custom-scrollbar flex-nowrap">
                    @foreach($modulosActivos->flatMap->lecciones as $leccion)
                        <div class="relative group flex-shrink-0 rounded-2xl border border-slate-100 overflow-hidden" style="width: 210px;">
                            <a href="{{ route('admin.aula.show', ['curso_id' => $curso->id, 'leccion_id' => $leccion->id]) }}">
                                <x-atomics.module-card
                                    titulo="{{ $leccion->titulo }}"
                                    imagen="https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                                    :esGrande="true"
                                />
                            </a>

                            @if(in_array(Auth::user()->rol->nombre ?? '', ['admin', 'instructor']))
                                <a href="{{ route('admin.lecciones.edit', $leccion->id) }}"
                                   class="absolute top-2 right-2 bg-white/90 hover:bg-indigo-600 text-slate-700 hover:text-white p-2 rounded-full shadow-xs transition z-10"
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
                <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                    <h3 class="text-slate-900 font-bold text-lg mb-4">Recursos de esta lección</h3>
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
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #cbd5e1;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #94a3b8;
    }
</style>
@endpush