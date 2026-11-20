<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'UniLearning | Aprende. Conecta. Crece.')</title>

    <meta name="description"
          content="@yield('description', 'UniLearning: plataforma universitaria de aprendizaje en línea.')">

    {{-- Tipografía Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    {{-- Recursos exclusivos del portal público --}}
    @vite(['resources/css/public.css', 'resources/js/public.js'])
</head>

<body>

    {{-- ================= NAVBAR PÚBLICO ================= --}}
    <nav class="navbar navbar-expand-lg public-navbar sticky-top">
        <div class="container">

            {{-- Logo y nombre --}}
            <a class="navbar-brand" href="/">
                <i class="bi bi-mortarboard-fill me-2"></i>
                UniLearning
            </a>

            {{-- Botón responsive --}}
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#publicNavbar"
                    aria-controls="publicNavbar"
                    aria-expanded="false"
                    aria-label="Abrir menú de navegación">

                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Menú de navegación --}}
            <div class="collapse navbar-collapse" id="publicNavbar">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#cursos">Cursos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#beneficios">Beneficios</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>

                </ul>

                {{-- Botones de acceso --}}
                <div class="d-flex flex-column flex-lg-row gap-2">

                    <a href="#" class="btn btn-unilearning-outline">
                        Iniciar sesión
                    </a>

                    <a href="#" class="btn btn-unilearning">
                        Registrarse
                    </a>

                </div>

            </div>

        </div>
    </nav>


    {{-- ================= CONTENIDO PRINCIPAL ================= --}}
    <main>

        {{-- Aquí se carga el contenido de cada página pública --}}
        @yield('content')

    </main>


    {{-- ================= FOOTER PÚBLICO ================= --}}
    <footer class="public-footer py-4">
        <div class="container">

            <div class="row align-items-center">

                {{-- Información de UniLearning --}}
                <div class="col-md-6 mb-3 mb-md-0">

                    <h5 class="fw-bold">
                        <i class="bi bi-mortarboard-fill me-2"></i>
                        UniLearning
                    </h5>

                    <p class="mb-0">
                        Aprende. Conecta. Crece.
                    </p>

                    <small>
                        Plataforma universitaria de aprendizaje en línea.
                    </small>

                </div>

                {{-- Enlaces --}}
                <div class="col-md-6 text-md-end">

                    <a href="/" class="me-3">
                        Inicio
                    </a>

                    <a href="#cursos" class="me-3">
                        Cursos
                    </a>

                    <a href="#contacto">
                        Contacto
                    </a>

                </div>

            </div>

            <hr class="border-light opacity-25">

            {{-- Copyright --}}
            <div class="text-center">

                <small>
                    UniLearning &copy; {{ date('Y') }}.
                    Todos los derechos reservados.
                </small>

            </div>

        </div>
    </footer>

</body>

</html>