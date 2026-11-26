@extends('layouts.student')

@section('title', 'Mi Perfil')
@section('active-perfil', 'active')

@section('content')

<style>
    .profile-header {
        background: linear-gradient(135deg, #143D60, #27667B);
        border-radius: 20px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
    }

    .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: #DDEB9D;
        color: #143D60;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 42px;
        font-weight: 700;
        border: 5px solid rgba(255,255,255,.25);
    }

    .profile-card {
        background: white;
        border-radius: 18px;
        border: 1px solid #e9edf2;
        padding: 25px;
        height: 100%;
    }

    .profile-card-title {
        color: #143D60;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 20px;
    }

    .profile-label {
        color: #718096;
        font-size: .85rem;
        margin-bottom: 6px;
    }

    .profile-value {
        color: #2d3748;
        font-weight: 600;
    }

    .profile-info-item {
        padding: 15px 0;
        border-bottom: 1px solid #edf0f4;
    }

    .profile-info-item:last-child {
        border-bottom: none;
    }

    .profile-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #edf5f8;
        color: #27667B;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .profile-badge {
        background: #DDEB9D;
        color: #143D60;
        padding: 7px 14px;
        border-radius: 30px;
        font-size: .85rem;
        font-weight: 600;
    }

    .profile-btn {
        background: #143D60;
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px 18px;
        font-weight: 600;
    }

    .profile-btn:hover {
        background: #27667B;
        color: white;
    }

    .profile-secondary-btn {
        background: white;
        border: 1px solid #dce3ea;
        color: #143D60;
        border-radius: 10px;
        padding: 10px 18px;
        font-weight: 600;
    }

    .profile-secondary-btn:hover {
        background: #f5f8fa;
    }

    .profile-stat {
        background: #f7fafc;
        border-radius: 14px;
        padding: 18px;
        text-align: center;
    }

    .profile-stat-number {
        font-size: 1.6rem;
        font-weight: 800;
        color: #143D60;
    }

    .profile-stat-label {
        color: #718096;
        font-size: .85rem;
    }

    .profile-security-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #edf0f4;
    }

    .profile-security-item:last-child {
        border-bottom: none;
    }

    @media (max-width: 768px) {
        .profile-header {
            padding: 22px;
        }

        .profile-avatar {
            width: 85px;
            height: 85px;
            font-size: 32px;
        }

        .profile-header-content {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    }
</style>

<div class="container-fluid">

    {{-- Encabezado --}}
    <div class="profile-header">
        <div class="d-flex align-items-center gap-4 profile-header-content">

            <div class="profile-avatar">
                JP
            </div>

            <div class="flex-grow-1">
                <h2 class="fw-bold mb-2">¡Hola, Juan Pérez!</h2>
                <p class="mb-3 opacity-75">
                    Este es tu espacio personal dentro de UniLearning.
                </p>

                <span class="profile-badge">
                    <i class="bi bi-mortarboard-fill me-1"></i>
                    Estudiante
                </span>
            </div>

            <div>
                <button class="btn btn-light fw-semibold"
                        onclick="mostrarMensajePerfil()">
                    <i class="bi bi-pencil-square me-2"></i>
                    Editar perfil
                </button>
            </div>

        </div>
    </div>

    {{-- Estadísticas --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="profile-stat">
                <div class="profile-stat-number">4</div>
                <div class="profile-stat-label">Cursos inscritos</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="profile-stat">
                <div class="profile-stat-number">2</div>
                <div class="profile-stat-label">Cursos completados</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="profile-stat">
                <div class="profile-stat-number">85%</div>
                <div class="profile-stat-label">Promedio de progreso</div>
            </div>
        </div>

    </div>

    <div class="row g-4">

        {{-- Información personal --}}
        <div class="col-lg-7">

            <div class="profile-card">

                <h5 class="profile-card-title">
                    <i class="bi bi-person-circle me-2"></i>
                    Información personal
                </h5>

                <div class="profile-info-item d-flex align-items-center gap-3">
                    <div class="profile-icon">
                        <i class="bi bi-person"></i>
                    </div>

                    <div>
                        <div class="profile-label">Nombre completo</div>
                        <div class="profile-value">Juan Pérez</div>
                    </div>
                </div>

                <div class="profile-info-item d-flex align-items-center gap-3">
                    <div class="profile-icon">
                        <i class="bi bi-envelope"></i>
                    </div>

                    <div>
                        <div class="profile-label">Correo electrónico</div>
                        <div class="profile-value">juan.perez@email.com</div>
                    </div>
                </div>

                <div class="profile-info-item d-flex align-items-center gap-3">
                    <div class="profile-icon">
                        <i class="bi bi-telephone"></i>
                    </div>

                    <div>
                        <div class="profile-label">Teléfono</div>
                        <div class="profile-value">9999-9999</div>
                    </div>
                </div>

                <div class="profile-info-item d-flex align-items-center gap-3">
                    <div class="profile-icon">
                        <i class="bi bi-calendar3"></i>
                    </div>

                    <div>
                        <div class="profile-label">Fecha de nacimiento</div>
                        <div class="profile-value">15 de mayo de 2005</div>
                    </div>
                </div>

                <div class="profile-info-item d-flex align-items-center gap-3">
                    <div class="profile-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>

                    <div>
                        <div class="profile-label">Ubicación</div>
                        <div class="profile-value">Tegucigalpa, Honduras</div>
                    </div>
                </div>

            </div>

        </div>

        {{-- Información académica --}}
        <div class="col-lg-5">

            <div class="profile-card">

                <h5 class="profile-card-title">
                    <i class="bi bi-mortarboard me-2"></i>
                    Información académica
                </h5>

                <div class="profile-info-item">
                    <div class="profile-label">Tipo de usuario</div>
                    <div class="profile-value">Estudiante</div>
                </div>

                <div class="profile-info-item">
                    <div class="profile-label">Estado de la cuenta</div>
                    <div class="profile-value">
                        <span class="badge bg-success-subtle text-success">
                            <i class="bi bi-check-circle me-1"></i>
                            Activa
                        </span>
                    </div>
                </div>

                <div class="profile-info-item">
                    <div class="profile-label">Fecha de registro</div>
                    <div class="profile-value">10 de septiembre de 2026</div>
                </div>

                <div class="profile-info-item">
                    <div class="profile-label">Nivel de aprendizaje</div>
                    <div class="profile-value">Nivel intermedio</div>
                </div>

            </div>

        </div>

        {{-- Seguridad --}}
        <div class="col-lg-7">

            <div class="profile-card">

                <h5 class="profile-card-title">
                    <i class="bi bi-shield-lock me-2"></i>
                    Seguridad de la cuenta
                </h5>

                <div class="profile-security-item">

                    <div class="d-flex align-items-center gap-3">
                        <div class="profile-icon">
                            <i class="bi bi-key"></i>
                        </div>

                        <div>
                            <div class="profile-value">Contraseña</div>
                            <div class="profile-label">
                                Actualiza tu contraseña periódicamente
                            </div>
                        </div>
                    </div>

                    <button class="profile-secondary-btn"
                            onclick="mostrarMensajePerfil()">
                        Cambiar
                    </button>

                </div>

                <div class="profile-security-item">

                    <div class="d-flex align-items-center gap-3">
                        <div class="profile-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <div>
                            <div class="profile-value">Seguridad de la cuenta</div>
                            <div class="profile-label">
                                Tu cuenta está protegida
                            </div>
                        </div>
                    </div>

                    <span class="badge bg-success-subtle text-success">
                        Protegida
                    </span>

                </div>

            </div>

        </div>

        {{-- Preferencias --}}
        <div class="col-lg-5">

            <div class="profile-card">

                <h5 class="profile-card-title">
                    <i class="bi bi-gear me-2"></i>
                    Preferencias
                </h5>

                <div class="profile-security-item">

                    <div class="d-flex align-items-center gap-3">
                        <div class="profile-icon">
                            <i class="bi bi-bell"></i>
                        </div>

                        <div>
                            <div class="profile-value">Notificaciones</div>
                            <div class="profile-label">
                                Recibe novedades de tus cursos
                            </div>
                        </div>
                    </div>

                    <button class="profile-secondary-btn"
                            onclick="mostrarMensajePerfil()">
                        Configurar
                    </button>

                </div>

                <div class="profile-security-item">

                    <div class="d-flex align-items-center gap-3">
                        <div class="profile-icon">
                            <i class="bi bi-palette"></i>
                        </div>

                        <div>
                            <div class="profile-value">Personalización</div>
                            <div class="profile-label">
                                Configuración de tu experiencia
                            </div>
                        </div>
                    </div>

                    <button class="profile-secondary-btn"
                            onclick="mostrarMensajePerfil()">
                        Ver
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function mostrarMensajePerfil() {
        alert('Esta función estará disponible cuando se integre el backend.');
    }
</script>

@endsection