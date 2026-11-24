
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel del estudiante') | UniLearning</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --ul-blue: #143D60;
            --ul-petroleum: #27667B;
            --ul-green: #A0C878;
            --ul-light-green: #DDEB9D;
            --ul-bg: #f5f7fa;
            --ul-text: #25364a;
            --ul-muted: #7b8794;
            --ul-sidebar-width: 260px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: var(--ul-bg);
            color: var(--ul-text);
        }

        /* SIDEBAR */
        .student-sidebar {
            width: var(--ul-sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--ul-blue);
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 1050;
            transition: transform .3s ease;
        }

        .sidebar-brand {
            padding: 28px 24px;
            display: flex;
            align-items: center;
            gap: 13px;
            border-bottom: 1px solid rgba(255,255,255,.10);
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            background: var(--ul-green);
            color: var(--ul-blue);
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .brand-name {
            font-size: 21px;
            font-weight: 700;
            letter-spacing: .3px;
            margin: 0;
        }

        .brand-subtitle {
            color: rgba(255,255,255,.65);
            font-size: 11px;
            margin-top: 2px;
        }

        .sidebar-menu {
            padding: 25px 16px;
            flex: 1;
            overflow-y: auto;
        }

        .sidebar-section-title {
            color: rgba(255,255,255,.45);
            text-transform: uppercase;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.3px;
            padding: 0 13px;
            margin-bottom: 12px;
        }

        .student-nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            margin-bottom: 5px;
            color: rgba(255,255,255,.75);
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            transition: all .2s ease;
        }

        .student-nav-link i {
            font-size: 18px;
            width: 22px;
            text-align: center;
        }

        .student-nav-link:hover {
            background: rgba(255,255,255,.09);
            color: white;
        }

        .student-nav-link.active {
            background: var(--ul-green);
            color: var(--ul-blue);
            font-weight: 700;
        }

        .sidebar-bottom {
            padding: 18px 16px;
            border-top: 1px solid rgba(255,255,255,.10);
        }

        .help-card {
            background: rgba(255,255,255,.08);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .help-card-title {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .help-card-text {
            font-size: 11px;
            color: rgba(255,255,255,.65);
            margin-bottom: 12px;
        }

        .help-card a {
            color: var(--ul-light-green);
            font-size: 12px;
            text-decoration: none;
            font-weight: 600;
        }

        /* MAIN */
        .student-main {
            margin-left: var(--ul-sidebar-width);
            min-height: 100vh;
        }

        /* TOPBAR */
        .student-topbar {
            height: 75px;
            background: white;
            border-bottom: 1px solid #e8edf2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-heading {
            font-size: 20px;
            font-weight: 700;
            color: var(--ul-blue);
            margin: 0;
        }

        .page-subheading {
            font-size: 12px;
            color: var(--ul-muted);
            margin-top: 3px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .topbar-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #edf0f3;
            border-radius: 10px;
            color: var(--ul-petroleum);
            background: white;
            text-decoration: none;
            position: relative;
        }

        .notification-dot {
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #e76f51;
            top: 7px;
            right: 7px;
        }

        .student-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--ul-light-green);
            color: var(--ul-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--ul-blue);
        }

        .profile-role {
            font-size: 11px;
            color: var(--ul-muted);
        }

        /* CONTENT */
        .student-content {
            padding: 32px 35px;
        }

        .content-container {
            max-width: 1450px;
            margin: auto;
        }

        /* GENERAL COMPONENTS */
        .student-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #edf0f3;
            box-shadow: 0 3px 12px rgba(20,61,96,.035);
        }

        .student-card-header {
            padding: 20px 22px;
            border-bottom: 1px solid #edf0f3;
        }

        .student-card-body {
            padding: 22px;
        }

        .section-title {
            font-size: 17px;
            font-weight: 700;
            color: var(--ul-blue);
            margin-bottom: 5px;
        }

        .section-description {
            font-size: 13px;
            color: var(--ul-muted);
        }

        .btn-ul-primary {
            background: var(--ul-blue);
            border-color: var(--ul-blue);
            color: white;
            border-radius: 9px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-ul-primary:hover {
            background: var(--ul-petroleum);
            border-color: var(--ul-petroleum);
            color: white;
        }

        .btn-ul-outline {
            background: white;
            border: 1px solid #dce4eb;
            color: var(--ul-blue);
            border-radius: 9px;
            padding: 9px 16px;
            font-size: 13px;
            font-weight: 600;
        }

        .text-ul-blue {
            color: var(--ul-blue);
        }

        .text-ul-petroleum {
            color: var(--ul-petroleum);
        }

        .text-ul-green {
            color: #639345;
        }

        .bg-ul-light {
            background: #edf5f8;
        }

        .student-footer {
            padding: 20px 35px;
            color: var(--ul-muted);
            font-size: 12px;
            text-align: center;
        }

        /* MOBILE */
        .sidebar-toggle {
            display: none;
            border: none;
            background: transparent;
            color: var(--ul-blue);
            font-size: 23px;
            padding: 0;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.4);
            z-index: 1040;
        }

        @media (max-width: 991px) {
            .student-sidebar {
                transform: translateX(-100%);
            }

            .student-sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
            }

            .student-main {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
            }

            .student-topbar {
                padding: 0 20px;
            }

            .student-content {
                padding: 25px 20px;
            }
        }

        @media (max-width: 576px) {
            .student-topbar {
                height: 65px;
                padding: 0 15px;
            }

            .page-heading {
                font-size: 17px;
            }

            .page-subheading {
                display: none;
            }

            .topbar-right {
                gap: 10px;
            }

            .profile-info {
                display: none;
            }

            .student-content {
                padding: 20px 15px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="student-sidebar" id="studentSidebar">

        <div class="sidebar-brand">
            <div class="brand-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div>
                <h1 class="brand-name">UniLearning</h1>
                <div class="brand-subtitle">Plataforma educativa</div>
            </div>
        </div>

        <div class="sidebar-menu">

            <div class="sidebar-section-title">Mi aprendizaje</div>

            <a href="#" class="student-nav-link @yield('active-dashboard')">
                <i class="bi bi-house-door"></i>
                <span>Inicio</span>
            </a>

            <a href="#" class="student-nav-link @yield('active-cursos')">
                <i class="bi bi-journal-bookmark"></i>
                <span>Mis cursos</span>
            </a>

            <a href="#" class="student-nav-link @yield('active-recursos')">
                <i class="bi bi-folder2-open"></i>
                <span>Recursos</span>
            </a>

            <div class="sidebar-section-title mt-4">Mi cuenta</div>

            <a href="#" class="student-nav-link @yield('active-certificados')">
                <i class="bi bi-award"></i>
                <span>Certificados</span>
            </a>

            <a href="#" class="student-nav-link @yield('active-facturas')">
                <i class="bi bi-receipt"></i>
                <span>Facturas</span>
            </a>

            <a href="#" class="student-nav-link @yield('active-perfil')">
                <i class="bi bi-person-circle"></i>
                <span>Mi perfil</span>
            </a>

        </div>

        <div class="sidebar-bottom">

            <div class="help-card">
                <div class="help-card-title">
                    <i class="bi bi-question-circle me-1"></i>
                    ¿Necesitas ayuda?
                </div>

                <p class="help-card-text">
                    Si tienes problemas con tu aprendizaje, estamos aquí para ayudarte.
                </p>

                <a href="#">
                    Contactar soporte
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <a href="#" class="student-nav-link">
                <i class="bi bi-box-arrow-left"></i>
                <span>Cerrar sesión</span>
            </a>

        </div>

    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- MAIN -->
    <div class="student-main">

        <!-- TOPBAR -->
        <header class="student-topbar">

            <div class="topbar-left">

                <button class="sidebar-toggle" id="sidebarToggle" type="button">
                    <i class="bi bi-list"></i>
                </button>

                <div>
                    <h2 class="page-heading">@yield('page-title', 'Mi aprendizaje')</h2>
                    <div class="page-subheading">
                        @yield('page-subtitle', 'Continúa aprendiendo y alcanza tus metas')
                    </div>
                </div>

            </div>

            <div class="topbar-right">

                <a href="#" class="topbar-icon" title="Notificaciones">
                    <i class="bi bi-bell"></i>
                    <span class="notification-dot"></span>
                </a>

                <div class="student-profile">

                    <div class="student-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'ES', 0, 1)) }}
                    </div>

                    <div class="profile-info">
                        <div class="profile-name">
                            {{ auth()->user()->name ?? 'Estudiante' }}
                        </div>

                        <div class="profile-role">
                            Estudiante
                        </div>
                    </div>

                </div>

            </div>

        </header>

        <!-- PAGE CONTENT -->
        <main class="student-content">
            <div class="content-container">
                @yield('content')
            </div>
        </main>

        <!-- FOOTER -->
        <footer class="student-footer">
            © {{ date('Y') }} UniLearning · Aprende, crece y alcanza tus metas.
        </footer>

    </div>

    <!-- JAVASCRIPT -->
    <script>
        const sidebar = document.getElementById('studentSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggle = document.getElementById('sidebarToggle');

        function openSidebar() {
            sidebar.classList.add('show');
            overlay.classList.add('show');
        }

        function closeSidebar() {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        }

        toggle?.addEventListener('click', openSidebar);
        overlay?.addEventListener('click', closeSidebar);

        document.querySelectorAll('.student-nav-link').forEach(link => {
            link.addEventListener('click', function () {
                if (window.innerWidth <= 991) {
                    closeSidebar();
                }
            });
        });
    </script>

    @stack('scripts')

</body>
</html>
