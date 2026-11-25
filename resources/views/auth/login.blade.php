@extends('layouts.public')

@section('title', 'Iniciar sesión | UniLearning')

@section('content')

<style>
    .login-section {
        min-height: 80vh;
        background: #F5F7FA;
        display: flex;
        align-items: center;
        padding: 55px 15px;
    }

    .login-card {
        max-width: 950px;
        width: 100%;
        margin: auto;
        background: white;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 12px 40px rgba(20, 61, 96, 0.12);
    }

    .login-info {
        background: linear-gradient(135deg, #143D60, #27667B);
        color: white;
        padding: 50px 35px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 520px;
    }

    .login-logo {
        width: 75px;
        height: 75px;
        background: #DDEB9D;
        color: #143D60;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.4rem;
        margin-bottom: 25px;
    }

    .login-info h2 {
        font-weight: 800;
        margin-bottom: 15px;
    }

    .login-info p {
        color: rgba(255,255,255,.82);
        line-height: 1.8;
    }

    .login-form {
        padding: 50px 45px;
    }

    .login-form h3 {
        color: #143D60;
        font-weight: 800;
    }

    .login-form .form-label {
        color: #17324D;
        font-weight: 600;
    }

    .login-form .form-control {
        padding: 13px 15px;
        border-radius: 10px;
        border: 1px solid #DEE4EA;
    }

    .login-form .form-control:focus {
        border-color: #27667B;
        box-shadow: 0 0 0 3px rgba(39,102,123,.12);
    }

    .login-button {
        background: #A0C878;
        color: #143D60;
        border: none;
        padding: 13px;
        border-radius: 10px;
        font-weight: 700;
        width: 100%;
        transition: .2s;
    }

    .login-button:hover {
        background: #DDEB9D;
        color: #143D60;
    }

    .login-link {
        color: #27667B;
        font-weight: 600;
        text-decoration: none;
    }

    .login-link:hover {
        color: #143D60;
        text-decoration: underline;
    }

    @media (max-width: 767px) {
        .login-info {
            min-height: auto;
            padding: 35px 25px;
        }

        .login-form {
            padding: 35px 25px;
        }
    }
</style>

<section class="login-section">

    <div class="login-card">

        <div class="row g-0">

            {{-- Panel informativo --}}
            <div class="col-md-5">

                <div class="login-info">

                    <div class="login-logo">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h2>¡Bienvenida a UniLearning!</h2>

                    <p>
                        Tu espacio para aprender, desarrollar nuevas
                        habilidades y alcanzar tus metas.
                    </p>

                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill me-3"
                               style="color:#DDEB9D;"></i>
                            Aprende a tu propio ritmo.
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill me-3"
                               style="color:#DDEB9D;"></i>
                            Accede a tus cursos en línea.
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill me-3"
                               style="color:#DDEB9D;"></i>
                            Continúa creciendo cada día.
                        </div>
                    </div>

                </div>

            </div>

            {{-- Formulario de inicio de sesión --}}
            <div class="col-md-7">

                <div class="login-form">

                    <div class="mb-4">
                        <span class="badge rounded-pill mb-3"
                              style="background:#DDEB9D; color:#143D60;">
                            PLATAFORMA EDUCATIVA
                        </span>

                        <h3>Iniciar sesión</h3>

                        <p class="text-secondary">
                            Ingresa tus datos para continuar aprendiendo.
                        </p>
                    </div>

                    <form>

                        @csrf

                        {{-- Correo electrónico --}}
                        <div class="mb-3">

                            <label for="email" class="form-label">
                                Correo electrónico
                            </label>

                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-envelope text-secondary"></i>
                                </span>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="nombre@correo.com"
                                    autocomplete="email"
                                    required
                                >
                            </div>

                        </div>

                        {{-- Contraseña --}}
                        <div class="mb-3">

                            <label for="password" class="form-label">
                                Contraseña
                            </label>

                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-lock text-secondary"></i>
                                </span>

                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Ingresa tu contraseña"
                                    autocomplete="current-password"
                                    required
                                >
                            </div>

                        </div>

                        {{-- Recordarme y recuperar contraseña --}}
                        <div class="d-flex justify-content-between
                                    align-items-center flex-wrap gap-2 mb-4">

                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="remember"
                                    name="remember"
                                >

                                <label class="form-check-label text-secondary"
                                       for="remember">
                                    Recordarme
                                </label>
                            </div>

                            <a href="#" class="login-link small">
                                ¿Olvidaste tu contraseña?
                            </a>

                        </div>

                        {{-- Botón --}}
                        <button type="button" class="login-button">
                            Iniciar sesión
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>

                        {{-- Registro --}}
                        <div class="text-center mt-4">

                            <span class="text-secondary">
                                ¿No tienes una cuenta?
                            </span>

                            <a href="#" class="login-link">
                                Registrarse
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
