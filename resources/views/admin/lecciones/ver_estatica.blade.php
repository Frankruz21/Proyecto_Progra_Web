@extends('layouts.admin') {{-- Asumiendo que usas tu layout con AdminLTE --}}

@section('title', 'Visor de Lección (Admin)')

@section('content')
<div class="container-fluid py-4">
    <div class="row g-4">
        
        <!-- COLUMNA IZQUIERDA: TEMARIO -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100 rounded-3">
                <div class="card-body p-4">
                    
                    <h5 class="fw-bold text-dark mb-3">Desarrollo Web con Laravel</h5>
                    
                    <!-- Progreso -->
                    <div class="d-flex justify-content-between text-muted small mb-1">
                        <span>Progreso del curso</span>
                        <span class="fw-bold" style="color: #143D60;">75%</span>
                    </div>
                    <div class="progress mb-4" style="height: 6px;">
                        <div class="progress-bar" role="progressbar" style="width: 75%; background-color: #A0C878;"></div>
                    </div>

                    <!-- Módulo 1 -->
                    <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2">
                        <span class="fw-bold text-dark small">Módulo 1: Fundamentos</span>
                        <a href="##" class="btn btn-sm btn-link text-warning p-0" title="Editar Módulo">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </div>
                    
                    <!-- Lección 1 -->
                    <div class="d-flex justify-content-between align-items-center ps-3 py-1">
                        <span class="text-muted small">1. Introducción</span>
                        <a href="##" class="btn btn-sm btn-link text-warning p-0"><i class="bi bi-pencil-fill"></i></a>
                    </div>
                    
                    <!-- Lección 2 -->
                    <div class="d-flex justify-content-between align-items-center ps-3 py-1">
                        <span class="text-muted small">2. Instalación</span>
                        <a href="##" class="btn btn-sm btn-link text-warning p-0"><i class="bi bi-pencil-fill"></i></a>
                    </div>

                    <!-- Lección 3 (Activa) -->
                    <div class="d-flex justify-content-between align-items-center ps-3 py-1 rounded" style="background-color: #DDEB9D;">
                        <span class="text-dark fw-bold small">3. Estructura del proyecto</span>
                        <a href="##" class="btn btn-sm btn-link text-warning p-0"><i class="bi bi-pencil-fill"></i></a>
                    </div>

                    <!-- Botón Nueva Lección (Módulo 1) -->
                    <div class="mt-2 mb-3">
                        <a href="##" class="btn btn-sm w-100 fw-bold text-white rounded-pill" style="background-color: #A0C878;">
                            + nueva lección
                        </a>
                    </div>

                    <!-- Módulo 2 -->
                    <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2 mt-2">
                        <span class="fw-bold text-dark small">Módulo 2: Rutas y Controladores</span>
                        <a href="##" class="btn btn-sm btn-link text-warning p-0" title="Editar Módulo">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </div>

                    <!-- Botón Nueva Lección (Módulo 2) -->
                    <div class="mb-3">
                        <a href="##" class="btn btn-sm w-100 fw-bold text-white rounded-pill" style="background-color: #A0C878;">
                            + nueva lección
                        </a>
                    </div>

                    <!-- Botón Nuevo Módulo -->
                    <div class="mt-4">
                        <a href="##" class="btn btn-sm w-100 fw-bold text-dark bg-light border rounded-pill">
                            + Nuevo Módulo
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- COLUMNA DERECHA: VISOR DE LECCIÓN -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 h-100 rounded-3">
                <div class="card-body p-4">
                    
                    <!-- Breadcrumb -->
                    <div class="mb-3">
                        <small class="text-muted">Módulo 1: Fundamentos</small>
                        <h3 class="fw-bold text-dark mb-0" style="color: #143D60 !important;">3. Estructura del proyecto</h3>
                    </div>

                    <!-- Reproductor de Video (Simulado) -->
                    <div class="bg-dark rounded-3 d-flex justify-content-center align-items-center mb-4 position-relative" style="aspect-ratio: 16/9; background-color: #0F172A !important;">
                        <div class="text-center">
                            <h2 class="text-white fw-bold mb-0">VIDEO</h2>
                            <p class="mt-1 mb-0" style="color: #A0C878;">Laravel</p>
                        </div>
                        <!-- Controles inferiores -->
                        <div class="position-absolute bottom-0 start-0 end-0 p-3 d-flex align-items-center text-white" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <i class="bi bi-play-fill fs-4 me-3"></i>
                            <small>0:00 / 10:24</small>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                        <h5 class="fw-bold mb-0" style="color: #143D60;">Descripción</h5>
                        <a href="##" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                    </div>

                    <p class="text-muted">
                        En esta lección conocerás la estructura de carpetas de un proyecto Laravel y la función de cada una.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection