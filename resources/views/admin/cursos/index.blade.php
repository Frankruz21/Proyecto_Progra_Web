@extends('layouts.admin') {{-- Usamos tu layout del panel --}}

@section('title', 'Mis Cursos')

@section('content')
<div class="container-fluid py-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Mis Cursos</h2>
            <p class="text-muted mb-0">Gestiona los cursos que estás impartiendo.</p>
        </div>
        <button type="button" class="btn btn-success rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCrearCurso">
            <i class="bi bi-plus-circle me-2"></i> Nuevo Curso
        </button>
    </div>

    <div class="row g-4">
        @forelse($cursos as $curso)
            <div class="col-lg-4 col-md-6">
                {{-- componente tarjeta --}}
                <x-course-card 
                    titulo="{{ $curso->titulo }}" 
                    descripcion="{{ $curso->descripcion_corta }}" 
                    categoria="{{ $curso->categoria->nombre ?? 'General' }}" 
                    colorFondo="#143D60" 
                    :cursoId="$curso->id"
                />
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-journal-x text-muted" style="font-size: 4rem;"></i>
                <h4 class="mt-3 text-muted">Aún no tienes cursos creados</h4>
                <p class="text-muted">Haz clic en "Nuevo Curso" para empezar a enseñar.</p>
            </div>
        @endforelse
    </div>

</div>

{{-- Usamos el componente del modal --}}
<x-modales.create-curso-modal />

@endsection