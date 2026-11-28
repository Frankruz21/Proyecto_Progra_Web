<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <script src="{{ asset('js/lecciones.js') }}"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = {prefix: 'tw-',}</script>

    <title>@yield('title', 'UniLearning')</title>

    {{-- Carga de CSS y JavaScript --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Colores de UniLearning --}}
    <style>
        :root {
            --unilearning-blue: #143D60;
            --unilearning-petroleum: #27667B;
            --unilearning-green: #A0C878;
            --unilearning-light-green: #DDEB9D;
        }

        .app-sidebar {
            background-color: var(--unilearning-blue) !important;
        }

        .sidebar-brand {
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .sidebar-brand .brand-text {
            color: white !important;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .sidebar-menu .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            border-radius: 8px;
            margin: 3px 8px;
        }

        .sidebar-menu .nav-link:hover,
        .sidebar-menu .nav-link.active {
            background-color: var(--unilearning-petroleum) !important;
            color: white !important;
        }

        .app-header {
            background-color: white;
        }

        .unilearning-title {
            color: var(--unilearning-blue);
            font-weight: 700;
        }

        .app-footer {
            background-color: white;
        }

        .btn-unilearning {
            background-color: var(--unilearning-blue);
            color: white;
        }

        .btn-unilearning:hover {
            background-color: var(--unilearning-petroleum);
            color: white;
        }

        /* Tema claro de UniLearning */
        body {
            background-color: #f4f6f9 !important;
            color: #343a40;
        }

        .app-wrapper {
            background-color: #f4f6f9;
        }

        .app-header {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e5e7eb;
        }

        .app-main {
            background-color: #f4f6f9;
        }

        .app-content-header {
            background-color: transparent;
        }

        .unilearning-title {
            color: var(--unilearning-blue) !important;
            font-weight: 700;
        }

        .card {
            background-color: #ffffff !important;
            color: #343a40 !important;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(20, 61, 96, 0.05);
        }

        .card-header {
            background-color: #ffffff !important;
            color: var(--unilearning-blue) !important;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-body {
            color: #343a40;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .app-footer {
            background-color: #ffffff !important;
            color: #6c757d;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg" data-bs-theme="light">

    <div class="app-wrapper">

        {{-- Navbar superior --}}
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link">
                            <i class="bi bi-mortarboard-fill"></i>
                            UniLearning
                        </span>
                    </li>
                </ul>

            </div>
        </nav>

        {{-- Sidebar --}}
        <aside class="app-sidebar shadow" data-bs-theme="dark">

            {{-- Nombre de la plataforma --}}
            <div class="sidebar-brand">
                <a href="#" class="brand-link text-decoration-none">
                    <span class="brand-text">
                        <i class="bi bi-mortarboard-fill me-2"></i>
                        UniLearning
                    </span>
                </a>
            </div>

            {{-- Menú lateral --}}
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column"
                        data-lte-toggle="treeview"
                        role="menu">

                       <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer2"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-header">GESTIÓN ACADÉMICA</li>

                        <li class="nav-item">
                            <a href="{{ route('admin.cursos.index') }}"
                            class="nav-link {{ request()->routeIs('admin.cursos.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-book"></i>
                                <p>Cursos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.lecciones.index') }}" class="nav-link {{ request()->routeIs('admin.lecciones.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-journal-text"></i>
                                <p>Lecciones</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-people"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-person-video3"></i>
                                <p>Instructores</p>
                            </a>
                        </li>

                        <li class="nav-header">CONFIGURACIÓN</li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-gear"></i>
                                <p>Configuración</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Cerrar sesión</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        {{-- Contenido principal --}}
        <main class="app-main">

            {{-- Título --}}
            <div class="app-content-header">
                <div class="container-fluid">
                    <h3 class="unilearning-title">
                        @yield('page-title', 'Dashboard')
                    </h3>
                </div>
            </div>

            {{-- Contenido de cada página --}}
            <div class="app-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>

        </main>

        {{-- Footer --}}
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">
                Plataforma Educativa
            </div>

            <strong>
                UniLearning &copy; {{ date('Y') }}
            </strong>
            - Todos los derechos reservados.
        </footer>

    </div>
    <script src="{{ asset('js/recursos-lecciones.js') }}"></script>
    @stack('scripts')
</body>
</html>