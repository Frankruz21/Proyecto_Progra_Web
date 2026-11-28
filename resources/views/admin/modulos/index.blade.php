@extends('layouts.admin')

@section('title', 'Gestión de Módulos')

@section('content')
<div class="container-fluid py-4">

    <!-- SECCION DE KPIs -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <x-atomics.kpi-card
                titulo="TOTAL MÓDULOS"
                :valor="$modulos->count()"
                colorFondo="#143D60"
                textoInferior="Módulos en este curso"
            />
        </div>
        <div class="col-md-4">
            <x-atomics.kpi-card
                titulo="LECCIONES"
                :valor="$modulos->sum('lecciones_count')"
                colorFondo="#27667B"
                textoInferior="Lecciones totales"
            />
        </div>
        <div class="col-md-4">
            <x-atomics.kpi-card
                titulo="CURSO"
                :valor="$cursoSeleccionado->titulo ?? 'Todos'"
                colorFondo="#A0C878"
                textoInferior="Curso actual"
            />
        </div>
    </div>

    <!-- TABLA -->
    <div class="card border-0 rounded-4 shadow-sm">
        <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-bold text-slate-900 mb-0 text-xl sm:text-2xl tracking-tight">
                    @if($cursoSeleccionado)
                        <span class="text-[#0f3d5e]">Módulos:</span>
                        <span class="text-[#3b8d82]">{{ $cursoSeleccionado->titulo }}</span>
                    @else
                        <span class="text-[#0f3d5e]">Lista de Módulos</span>
                    @endif
                </h4>
                <small class="text-muted">{{ $modulos->count() }} módulos</small>
            </div>

            <div class="d-flex gap-2">
                @if($cursoSeleccionado)
                    <a href="{{ route('admin.aula.show', $cursoSeleccionado->id) }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-[#0f3d5e] via-[#1b648c] to-[#3b8d82] hover:from-[#154c79] hover:via-[#1e739e] hover:to-[#4fa376] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition duration-200">
                        <i class="bi bi-play-circle-fill text-base"></i>
                        <span>Vista Previa del Curso</span>
                    </a>
                @endif

                <!-- BOTÓN NUEVO MÓDULO -->
                <x-atomics.expand-button
                    texto="Nuevo Módulo"
                    data-bs-toggle="modal"
                    data-bs-target="#modalCrearModulo"
                />
            </div>
        </div>

        <div class="card-body p-4">
            @php
                $columnas = [
                    [
                        'label' => 'Módulo', 'campo' => 'titulo', 'tipo' => 'avatar', 'icono' => 'bi-collection-play-fill',
                        'sub' => fn($m) => '#'.$m->id.' · '.Str::limit($m->descripcion ?? 'Sin descripción', 55),
                    ],
                    ['label' => 'Curso', 'campo' => 'curso.titulo', 'tipo' => 'badge'],
                    ['label' => 'Orden', 'campo' => 'orden', 'tipo' => 'numero', 'align' => 'center'],
                    [
                        'label' => 'Activo', 'campo' => 'activo', 'tipo' => 'switch', 'align' => 'center',
                        'url'   => fn($m) => route('admin.modulos.toggle', $m, false),
                    ],
                ];
            @endphp

            <x-tabla-dinamica
                :columnas="$columnas"
                :filas="$modulos"
                ruta="admin.modulos"
                :botones="['ver', 'editar', 'eliminar']"
                vacio="No hay módulos registrados todavía."
            />
        </div>
    </div>
</div>

@if($cursoSeleccionado)
    <x-modales.create-modulo-modal :cursoId="$cursoSeleccionado->id" />
@else
    <x-modales.create-modulo-modal />
@endif

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new bootstrap.Modal(document.getElementById('modalCrearModulo')).show();
        });
    </script>
@endif
@endsection