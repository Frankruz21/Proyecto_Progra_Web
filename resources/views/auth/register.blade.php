@extends('layouts.public')

@section('title', 'Crear cuenta | UniLearning')

@section('content')

<style>
    .register-section {
        min-height: 80vh;
        background: #F5F7FA;
        display: flex;
        align-items: center;
        padding: 45px 15px;
    }

    .register-card {
        max-width: 950px;
        width: 100%;
        margin: auto;
        background: white;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 12px 40px rgba(20, 61, 96, 0.12);
    }

    .register-info {
        background: linear-gradient(135deg, #143D60, #27667B);
        color: white;
        padding: 45px 35px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 580px;
    }

    .register-logo {
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

    .register-info h2 {
        font-weight: 800;
        margin-bottom: 15px;
    }

    .register-info p {
        color: rgba(255,255,255,.82);
        line-height: 1.8;
    }

    .register-form {
        padding: 45px;
    }

    .register-form h3 {
        color: #143D60;
        font-weight: 800;
    }

    .register-form .form-label {
        color: #17324D;
        font-weight: 600;
    }

    .register-form .form-control,
    .register-form .form-select {
        padding: 11px 14px;
        border-radius: 10px;
        border: 1px solid #DEE4EA;
    }

    .register-form .form-control:focus,
    .register-form .form-select:focus {
        border-color: #27667B;
        box-shadow: 0 0 0 3px rgba(39,102,123,.12);
    }

    .register-button {
        background: #A0C878;
        color: #143D60;
        border: none;
        padding: 13px;
        border-radius: 10px;
        font-weight: 700;
        width: 100%;
        transition: .2s;
    }

    .register-button:hover {
        background: #DDEB9D;
    }

    .register-link {
        color: #27667B;
        font-weight: 600;
        text-decoration: none;
    }

    .register-link:hover {
        color: #143D60;
        text-decoration: underline;
    }

    @media (max-width: 767px) {
        .register-info {
            min-height: auto;
            padding: 35px 25px;
        }

        .register-form {
            padding: 30px 25px;
        }
    }
</style>

<section class="register-section">

    <div class="register-card">
        <div class="row g-0">

            <div class="col-md-5">
                <div class="register-info">

                    <div class="register-logo">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h2>¡Únete a UniLearning!</h2>

                    <p>
                        Crea tu cuenta y comienza a descubrir nuevas
                        oportunidades de aprendizaje.
                    </p>

                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill me-3"
                               style="color:#DDEB9D;"></i>
                            Accede a diferentes cursos.
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill me-3"
                               style="color:#DDEB9D;"></i>
                            Aprende a tu propio ritmo.
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill me-3"
                               style="color:#DDEB9D;"></i>
                            Desarrolla nuevas habilidades.
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-7">
                <div class="register-form">

                    <div class="mb-4">
                        <span class="badge rounded-pill mb-3"
                              style="background:#DDEB9D; color:#143D60;">
                            CREA TU CUENTA
                        </span>

                        <h3>Registrarse</h3>

                        <p class="text-secondary">
                            Completa tus datos para formar parte de UniLearning.
                        </p>
                    </div>

                    <form action="{{ route('register.post') }}" method="POST" novalidate>

                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="primer_nombre" class="form-label">
                                    Primer nombre
                                </label>

                                <input
                                    type="text"
                                    class="form-control @error('primer_nombre') is-invalid @enderror"
                                    id="primer_nombre"
                                    name="primer_nombre"
                                    value="{{ old('primer_nombre') }}"
                                    placeholder="Primer nombre"
                                    autocomplete="given-name"
                                    required
                                >

                                @error('primer_nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="segundo_nombre" class="form-label">
                                    Segundo nombre <small class="text-secondary fw-normal">(opcional)</small>
                                </label>

                                <input
                                    type="text"
                                    class="form-control @error('segundo_nombre') is-invalid @enderror"
                                    id="segundo_nombre"
                                    name="segundo_nombre"
                                    value="{{ old('segundo_nombre') }}"
                                    placeholder="Segundo nombre"
                                    autocomplete="additional-name"
                                    
                                >

                                @error('segundo_nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="primer_apellido" class="form-label">
                                    Primer apellido
                                </label>

                                <input
                                    type="text"
                                    class="form-control @error('primer_apellido') is-invalid @enderror"
                                    id="primer_apellido"
                                    name="primer_apellido"
                                    value="{{ old('primer_apellido') }}"
                                    placeholder="Primer apellido"
                                    autocomplete="family-name"
                                    required
                                >

                                @error('primer_apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="segundo_apellido" class="form-label">
                                    Segundo apellido <small class="text-secondary fw-normal">(opcional)</small>
                                </label>

                                <input
                                    type="text"
                                    class="form-control @error('segundo_apellido') is-invalid @enderror"
                                    id="segundo_apellido"
                                    name="segundo_apellido"
                                    value="{{ old('segundo_apellido') }}"
                                    placeholder="Segundo apellido"
                                    autocomplete="off"
                                    
                                >

                                @error('segundo_apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                    Correo electrónico
                                </label>

                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="nombre@correo.com"
                                    autocomplete="email"
                                    required
                                >

                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">
                                    Teléfono <small class="text-secondary fw-normal">(opcional)</small>
                                </label>

                                <input
                                    type="tel"
                                    class="form-control @error('telefono') is-invalid @enderror"
                                    id="telefono"
                                    name="telefono"
                                    value="{{ old('telefono') }}"
                                    placeholder="Solo números, sin guiones"
                                    autocomplete="tel"
                                    
                                >

                                @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label">
                                    Contraseña
                                </label>

                                <input
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    name="password"
                                    placeholder="Mínimo 8 caracteres"
                                    autocomplete="new-password"
                                    required
                                >

                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="password_confirmation" class="form-label">
                                    Confirmar contraseña
                                </label>

                                <input
                                    type="password"
                                    class="form-control"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Repite tu contraseña"
                                    autocomplete="new-password"
                                    required
                                >
                            </div>
                        </div>

                        <button type="submit" class="register-button">
                            Crear cuenta
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>

                        <div class="text-center mt-4">
                            <span class="text-secondary">
                                ¿Ya tienes una cuenta?
                            </span>

                            <a href="{{ route('login') }}" class="register-link">
                                Iniciar sesión
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</section>

@endsection
