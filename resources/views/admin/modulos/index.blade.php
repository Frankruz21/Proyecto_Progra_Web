@extends('layouts.admin')

@section('title', 'Gestión de Módulos')

@section('content')
<div class="container-fluid py-4">
    
    <!-- SECCION DE KPIs -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <x-atomics.kpi-card 
                titulo="TOTAL MODULOS" 
                :valor="$modulos->count()" 
                colorFondo="#143D60" 
                textoInferior="Modulos en este curso"
            />
        </div>
        <div class="col-md-4">
            <x-atomics.kpi-card 
                titulo="LECCIONES" 
                :valor="$modulos->sum(fn($m) => $m->lecciones->count())" 
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
                <h4 class="fw-bold text-dark mb-0">
                    @if($cursoSeleccionado)
                        Módulos: <span class="text-success">{{ $cursoSeleccionado->titulo }}</span>
                    @else
                        Lista de Módulos
                    @endif
                </h4>
                <small class="text-muted">{{ $modulos->count() }} módulos</small>
            </div>
            
            <div class="d-flex gap-2">
                <!-- BOTÓN DE VISTA PREVIA (Solo si hay un curso seleccionado) -->
                @if($cursoSeleccionado)
                    <a href="{{ route('admin.aula.show', $cursoSeleccionado->id) }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                        <i class="bi bi-play-circle me-1"></i> Vista Previa del Curso
                    </a>
                @endif

                <!-- BOTÓN NUEVO MÓDULO -->
                <button type="button" class="btn btn-success rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCrearModulo">
                    <i class="bi bi-plus-lg me-1"></i> Nuevo Módulo
                </button>
            </div>
        </div>

        <div class="card-body p-4">
            @php
                $columnas = [
                    [
                        'label' => 'Módulo', 'campo' => 'titulo', 'tipo' => 'avatar', 'icono' => 'bi-collection-play',
                        'sub' => fn($m) => '#'.$m->id.' · '.Str::limit($m->descripcion ?? 'Sin descripción', 55),
                    ],
                    ['label' => 'Curso', 'campo' => 'curso.titulo', 'tipo' => 'badge'],
                    ['label' => 'Orden', 'campo' => 'orden', 'tipo' => 'numero', 'align' => 'center'],
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