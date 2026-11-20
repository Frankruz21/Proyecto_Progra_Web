@extends('layouts.admin')

@section('title', 'Dashboard | UniLearning')

@section('page-title', 'Dashboard')

@section('content')

    {{-- Bienvenida --}}
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="unilearning-title">
                ¡Bienvenido a UniLearning!
            </h4>

            <p class="text-muted mb-0">
                Plataforma de gestión de cursos en línea y aula virtual.
            </p>
        </div>
    </div>

    {{-- Estadísticas --}}
    <div class="row">

        {{-- Cursos --}}
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Cursos</h6>
                            <h2 class="unilearning-title">12</h2>
                        </div>

                        <i class="bi bi-book fs-1"
                           style="color: #27667B;"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Estudiantes --}}
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Estudiantes</h6>
                            <h2 class="unilearning-title">150</h2>
                        </div>

                        <i class="bi bi-people fs-1"
                           style="color: #A0C878;"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Instructores --}}
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Instructores</h6>
                            <h2 class="unilearning-title">8</h2>
                        </div>

                        <i class="bi bi-person-video3 fs-1"
                           style="color: #27667B;"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Certificados --}}
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Certificados</h6>
                            <h2 class="unilearning-title">35</h2>
                        </div>

                        <i class="bi bi-award fs-1"
                           style="color: #A0C878;"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Panel informativo --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Panel administrativo</h5>
        </div>

        <div class="card-body">
            <p>
                Desde este panel podremos administrar los cursos,
                usuarios, instructores, recursos educativos y
                diferentes funcionalidades de UniLearning.
            </p>

            <button class="btn btn-unilearning">
                <i class="bi bi-arrow-right-circle me-1"></i>
                Explorar plataforma
            </button>
        </div>
    </div>

@endsection