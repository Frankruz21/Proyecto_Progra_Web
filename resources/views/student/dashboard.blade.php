
@extends('layouts.student')

@section('title', 'Inicio')
@section('page-title', 'Mi aprendizaje')
@section('page-subtitle', 'Tu espacio para aprender, crecer y alcanzar tus metas')
@section('active-dashboard', 'active')

@section('content')

<!-- BIENVENIDA -->
<div class="welcome-banner mb-4">
    <div class="welcome-content">
        <span class="welcome-label">
            <i class="bi bi-stars me-1"></i>
            ¡Bienvenido a UniLearning!
        </span>

        <h2>
            ¡Hola, {{ auth()->user()->name ?? 'Estudiante' }}! 👋
        </h2>

        <p>
            Cada pequeño avance te acerca a tus grandes metas.
            ¿Listo para continuar aprendiendo?
        </p>

        <a href="#" class="btn welcome-button">
            Explorar mis cursos
            <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>

    <div class="welcome-illustration">
        <i class="bi bi-mortarboard-fill"></i>
        <div class="illustration-circle"></div>
        <div class="illustration-star star-one">✦</div>
        <div class="illustration-star star-two">✧</div>
    </div>
</div>

<!-- ESTADÍSTICAS -->
<div class="row g-3 mb-4">

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="dashboard-stat-card">
            <div class="stat-icon stat-blue">
                <i class="bi bi-journal-bookmark-fill"></i>
            </div>

            <div class="stat-label">Cursos inscritos</div>
            <div class="stat-number">4</div>

            <div class="stat-footer">
                <i class="bi bi-book me-1"></i>
                Tu aprendizaje activo
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="dashboard-stat-card">
            <div class="stat-icon stat-green">
                <i class="bi bi-play-circle-fill"></i>
            </div>

            <div class="stat-label">En progreso</div>
            <div class="stat-number">2</div>

            <div class="stat-footer">
                <i class="bi bi-lightning-charge me-1"></i>
                Continúa avanzando
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="dashboard-stat-card">
            <div class="stat-icon stat-petroleum">
                <i class="bi bi-check-circle-fill"></i>
            </div>

            <div class="stat-label">Completados</div>
            <div class="stat-number">1</div>

            <div class="stat-footer">
                <i class="bi bi-trophy me-1"></i>
                ¡Un logro alcanzado!
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="dashboard-stat-card">
            <div class="stat-icon stat-yellow">
                <i class="bi bi-award-fill"></i>
            </div>

            <div class="stat-label">Certificados</div>
            <div class="stat-number">1</div>

            <div class="stat-footer">
                <i class="bi bi-stars me-1"></i>
                Reconocimientos obtenidos
            </div>
        </div>
    </div>

</div>

<!-- CONTENIDO PRINCIPAL -->
<div class="row g-4">

    <!-- CURSOS -->
    <div class="col-12 col-xl-8">

        <div class="student-card h-100">

            <div class="student-card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h3 class="section-title mb-1">Continúa aprendiendo</h3>
                    <p class="section-description mb-0">
                        Retoma tus cursos donde los dejaste.
                    </p>
                </div>

                <a href="#" class="view-all-link">
                    Ver todos
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="student-card-body">

                <!-- CURSO 1 -->
                <div class="course-progress-item">

                    <div class="course-thumbnail course-thumbnail-blue">
                        <i class="bi bi-code-slash"></i>
                    </div>

                    <div class="course-information">
                        <div class="course-category">Tecnología</div>

                        <h5 class="course-name">
                            Fundamentos de programación
                        </h5>

                        <div class="course-progress-info">
                            <span>Progreso del curso</span>
                            <strong>65%</strong>
                        </div>

                        <div class="progress course-progress-bar">
                            <div class="progress-bar progress-blue" style="width: 65%"></div>
                        </div>

                        <div class="course-bottom-info">
                            <span>
                                <i class="bi bi-play-circle me-1"></i>
                                8 de 12 lecciones
                            </span>

                            <a href="#" class="continue-course-link">
                                Continuar
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <hr class="course-divider">

                <!-- CURSO 2 -->
                <div class="course-progress-item">

                    <div class="course-thumbnail course-thumbnail-green">
                        <i class="bi bi-palette-fill"></i>
                    </div>

                    <div class="course-information">
                        <div class="course-category">Diseño</div>

                        <h5 class="course-name">
                            Diseño web básico
                        </h5>

                        <div class="course-progress-info">
                            <span>Progreso del curso</span>
                            <strong>30%</strong>
                        </div>

                        <div class="progress course-progress-bar">
                            <div class="progress-bar progress-green" style="width: 30%"></div>
                        </div>

                        <div class="course-bottom-info">
                            <span>
                                <i class="bi bi-play-circle me-1"></i>
                                3 de 10 lecciones
                            </span>

                            <a href="#" class="continue-course-link">
                                Continuar
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <hr class="course-divider">

                <!-- CURSO 3 -->
                <div class="course-progress-item">

                    <div class="course-thumbnail course-thumbnail-petroleum">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>

                    <div class="course-information">
                        <div class="course-category">Productividad</div>

                        <h5 class="course-name">
                            Herramientas digitales
                        </h5>

                        <div class="course-progress-info">
                            <span>Progreso del curso</span>
                            <strong>100%</strong>
                        </div>

                        <div class="progress course-progress-bar">
                            <div class="progress-bar progress-petroleum" style="width: 100%"></div>
                        </div>

                        <div class="course-bottom-info">
                            <span>
                                <i class="bi bi-check-circle me-1"></i>
                                Curso completado
                            </span>

                            <a href="#" class="continue-course-link">
                                Ver curso
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- PROGRESO GENERAL -->
    <div class="col-12 col-xl-4">

        <div class="student-card h-100">

            <div class="student-card-header">
                <h3 class="section-title mb-1">Mi progreso</h3>

                <p class="section-description mb-0">
                    Así va tu camino de aprendizaje.
                </p>
            </div>

            <div class="student-card-body">

                <div class="overall-progress-container">

                    <div class="progress-circle">
                        <div class="progress-circle-inner">
                            <span class="progress-percentage">58%</span>
                            <span class="progress-caption">Completado</span>
                        </div>
                    </div>

                </div>

                <div class="progress-summary">

                    <div class="progress-summary-item">
                        <div class="summary-dot dot-blue"></div>

                        <div>
                            <div class="summary-label">Lecciones completadas</div>
                            <div class="summary-value">18 lecciones</div>
                        </div>
                    </div>

                    <div class="progress-summary-item">
                        <div class="summary-dot dot-green"></div>

                        <div>
                            <div class="summary-label">Tiempo de aprendizaje</div>
                            <div class="summary-value">12 horas</div>
                        </div>
                    </div>

                    <div class="progress-summary-item">
                        <div class="summary-dot dot-yellow"></div>

                        <div>
                            <div class="summary-label">Actividades realizadas</div>
                            <div class="summary-value">24 actividades</div>
                        </div>
                    </div>

                </div>

                <div class="motivation-message">
                    <i class="bi bi-lightbulb-fill"></i>

                    <div>
                        <strong>¡Vas por buen camino!</strong>

                        <p>
                            Mantén tu ritmo de aprendizaje.
                            Cada lección cuenta.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- ACTIVIDAD RECIENTE -->
<div class="row g-4 mt-1">

    <div class="col-12 col-xl-8">

        <div class="student-card">

            <div class="student-card-header d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="section-title mb-1">Actividad reciente</h3>

                    <p class="section-description mb-0">
                        Tus últimos avances en la plataforma.
                    </p>
                </div>

                <i class="bi bi-clock-history activity-header-icon"></i>
            </div>

            <div class="student-card-body">

                <div class="activity-item">

                    <div class="activity-icon activity-completed">
                        <i class="bi bi-check-lg"></i>
                    </div>

                    <div class="activity-information">
                        <h6>Lección completada</h6>

                        <p>
                            Fundamentos de programación ·
                            Introducción
                        </p>

                        <span>Hoy</span>
                    </div>

                    <div class="activity-status status-completed">
                        Completado
                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-icon activity-exam">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                    <div class="activity-information">
                        <h6>Actividad realizada</h6>

                        <p>
                            Diseño web básico ·
                            HTML y estructura
                        </p>

                        <span>Ayer</span>
                    </div>

                    <div class="activity-status status-score">
                        90 puntos
                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-icon activity-course">
                        <i class="bi bi-play-fill"></i>
                    </div>

                    <div class="activity-information">
                        <h6>Curso iniciado</h6>

                        <p>
                            Herramientas digitales
                        </p>

                        <span>Hace 3 días</span>
                    </div>

                    <div class="activity-status status-started">
                        Iniciado
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ACCIONES RÁPIDAS -->
    <div class="col-12 col-xl-4">

        <div class="student-card">

            <div class="student-card-header">
                <h3 class="section-title mb-1">Accesos rápidos</h3>

                <p class="section-description mb-0">
                    Encuentra fácilmente lo que necesitas.
                </p>
            </div>

            <div class="student-card-body quick-actions">

                <a href="#" class="quick-action-item">
                    <div class="quick-action-icon quick-blue">
                        <i class="bi bi-journal-bookmark"></i>
                    </div>

                    <div class="quick-action-text">
                        <strong>Mis cursos</strong>
                        <span>Explora tus cursos inscritos</span>
                    </div>

                    <i class="bi bi-chevron-right quick-action-arrow"></i>
                </a>

                <a href="#" class="quick-action-item">
                    <div class="quick-action-icon quick-green">
                        <i class="bi bi-folder2-open"></i>
                    </div>

                    <div class="quick-action-text">
                        <strong>Recursos</strong>
                        <span>Consulta tus materiales</span>
                    </div>

                    <i class="bi bi-chevron-right quick-action-arrow"></i>
                </a>

                <a href="#" class="quick-action-item">
                    <div class="quick-action-icon quick-yellow">
                        <i class="bi bi-award"></i>
                    </div>

                    <div class="quick-action-text">
                        <strong>Certificados</strong>
                        <span>Revisa tus logros</span>
                    </div>

                    <i class="bi bi-chevron-right quick-action-arrow"></i>
                </a>

            </div>

        </div>

    </div>

</div>

@endsection

@push('styles')
<style>
    /* WELCOME BANNER */
    .welcome-banner {
        background: linear-gradient(120deg, #143D60, #27667B);
        border-radius: 18px;
        padding: 32px 35px;
        color: white;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 220px;
    }

    .welcome-content {
        position: relative;
        z-index: 2;
        max-width: 650px;
    }

    .welcome-label {
        display: inline-block;
        color: var(--ul-light-green);
        background: rgba(221,235,157,.12);
        padding: 7px 12px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .welcome-content h2 {
        font-size: 29px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .welcome-content p {
        color: rgba(255,255,255,.75);
        font-size: 14px;
        margin-bottom: 20px;
    }

    .welcome-button {
        background: var(--ul-light-green);
        color: var(--ul-blue);
        border-radius: 9px;
        padding: 10px 18px;
        font-weight: 700;
        font-size: 13px;
    }

    .welcome-button:hover {
        background: var(--ul-green);
        color: var(--ul-blue);
    }

    .welcome-illustration {
        width: 210px;
        height: 210px;
        position: relative;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 25px;
    }

    .illustration-circle {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255,255,255,.09);
        border: 1px solid rgba(255,255,255,.1);
        position: absolute;
    }

    .welcome-illustration > i {
        font-size: 115px;
        color: var(--ul-light-green);
        position: relative;
        z-index: 2;
        filter: drop-shadow(0 10px 10px rgba(0,0,0,.15));
    }

    .illustration-star {
        position: absolute;
        color: var(--ul-light-green);
        font-size: 30px;
    }

    .star-one {
        top: 15px;
        right: 5px;
    }

    .star-two {
        bottom: 20px;
        left: 5px;
    }

    /* STATISTICS */
    .dashboard-stat-card {
        background: white;
        border: 1px solid #edf0f3;
        border-radius: 15px;
        padding: 20px;
        height: 100%;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .dashboard-stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(20,61,96,.07);
    }

    .stat-icon {
        width: 43px;
        height: 43px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        margin-bottom: 15px;
    }

    .stat-blue {
        background: #eaf1f8;
        color: var(--ul-blue);
    }

    .stat-green {
        background: #edf6e8;
        color: #649346;
    }

    .stat-petroleum {
        background: #e9f4f5;
        color: var(--ul-petroleum);
    }

    .stat-yellow {
        background: #fff7df;
        color: #b58b26;
    }

    .stat-label {
        color: var(--ul-muted);
        font-size: 12px;
        margin-bottom: 5px;
    }

    .stat-number {
        color: var(--ul-blue);
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .stat-footer {
        color: #8a96a3;
        font-size: 11px;
    }

    /* COURSE PROGRESS */
    .view-all-link {
        color: var(--ul-petroleum);
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
    }

    .view-all-link:hover {
        color: var(--ul-blue);
    }

    .course-progress-item {
        display: flex;
        gap: 18px;
        align-items: center;
    }

    .course-thumbnail {
        width: 78px;
        height: 78px;
        border-radius: 14px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }

    .course-thumbnail-blue {
        background: #e8f0f8;
        color: var(--ul-blue);
    }

    .course-thumbnail-green {
        background: #edf6e8;
        color: #649346;
    }

    .course-thumbnail-petroleum {
        background: #e8f3f4;
        color: var(--ul-petroleum);
    }

    .course-information {
        flex: 1;
        min-width: 0;
    }

    .course-category {
        color: var(--ul-petroleum);
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 4px;
    }

    .course-name {
        color: var(--ul-blue);
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .course-progress-info {
        display: flex;
        justify-content: space-between;
        font-size: 11px;
        color: var(--ul-muted);
        margin-bottom: 6px;
    }

    .course-progress-info strong {
        color: var(--ul-blue);
    }

    .course-progress-bar {
        height: 6px;
        background: #edf0f3;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .progress-blue {
        background: var(--ul-blue);
    }

    .progress-green {
        background: var(--ul-green);
    }

    .progress-petroleum {
        background: var(--ul-petroleum);
    }

    .course-bottom-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 8px;
        font-size: 11px;
        color: var(--ul-muted);
    }

    .continue-course-link {
        color: var(--ul-petroleum);
        font-weight: 700;
        text-decoration: none;
    }

    .continue-course-link:hover {
        color: var(--ul-blue);
    }

    .course-divider {
        border-color: #edf0f3;
        margin: 22px 0;
    }

    /* OVERALL PROGRESS */
    .overall-progress-container {
        display: flex;
        justify-content: center;
        padding: 15px 0 25px;
    }

    .progress-circle {
        width: 170px;
        height: 170px;
        border-radius: 50%;
        background: conic-gradient(
            var(--ul-green) 0% 58%,
            #edf0f3 58% 100%
        );
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .progress-circle-inner {
        width: 138px;
        height: 138px;
        background: white;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .progress-percentage {
        color: var(--ul-blue);
        font-size: 34px;
        font-weight: 800;
    }

    .progress-caption {
        color: var(--ul-muted);
        font-size: 11px;
    }

    .progress-summary {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .progress-summary-item {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .summary-dot {
        width: 11px;
        height: 11px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .dot-blue {
        background: var(--ul-blue);
    }

    .dot-green {
        background: var(--ul-green);
    }

    .dot-yellow {
        background: #e9bd54;
    }

    .summary-label {
        color: var(--ul-muted);
        font-size: 11px;
    }

    .summary-value {
        color: var(--ul-blue);
        font-size: 13px;
        font-weight: 700;
    }

    .motivation-message {
        background: #f0f7e9;
        border-radius: 12px;
        padding: 15px;
        display: flex;
        gap: 12px;
        margin-top: 24px;
    }

    .motivation-message > i {
        color: #77a650;
        font-size: 20px;
    }

    .motivation-message strong {
        font-size: 12px;
        color: var(--ul-blue);
    }

    .motivation-message p {
        font-size: 11px;
        color: #738269;
        margin: 5px 0 0;
    }

    /* RECENT ACTIVITY */
    .activity-header-icon {
        font-size: 22px;
        color: #9ba8b5;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 0;
        border-bottom: 1px solid #f0f2f4;
    }

    .activity-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .activity-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
    }

    .activity-completed {
        background: #edf6e8;
        color: #649346;
    }

    .activity-exam {
        background: #fff7df;
        color: #b58b26;
    }

    .activity-course {
        background: #e8f0f8;
        color: var(--ul-blue);
    }

    .activity-information {
        flex: 1;
        min-width: 0;
    }

    .activity-information h6 {
        color: var(--ul-blue);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .activity-information p {
        color: var(--ul-muted);
        font-size: 11px;
        margin-bottom: 4px;
    }

    .activity-information span {
        color: #a0aab4;
        font-size: 10px;
    }

    .activity-status {
        font-size: 10px;
        font-weight: 700;
        padding: 6px 9px;
        border-radius: 20px;
        white-space: nowrap;
    }

    .status-completed {
        background: #edf6e8;
        color: #649346;
    }

    .status-score {
        background: #fff7df;
        color: #b58b26;
    }

    .status-started {
        background: #e8f0f8;
        color: var(--ul-blue);
    }

    /* QUICK ACTIONS */
    .quick-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .quick-action-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        border: 1px solid #edf0f3;
        border-radius: 12px;
        text-decoration: none;
        transition: all .2s ease;
    }

    .quick-action-item:hover {
        background: #f8fafc;
        border-color: #dce5ec;
        transform: translateX(2px);
    }

    .quick-action-icon {
        width: 42px;
        height: 42px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .quick-blue {
        background: #e8f0f8;
        color: var(--ul-blue);
    }

    .quick-green {
        background: #edf6e8;
        color: #649346;
    }

    .quick-yellow {
        background: #fff7df;
        color: #b58b26;
    }

    .quick-action-text {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .quick-action-text strong {
        font-size: 12px;
        color: var(--ul-blue);
    }

    .quick-action-text span {
        font-size: 10px;
        color: var(--ul-muted);
        margin-top: 3px;
    }

    .quick-action-arrow {
        color: #aab5bf;
        font-size: 12px;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .welcome-banner {
            padding: 25px;
        }

        .welcome-content h2 {
            font-size: 23px;
        }

        .welcome-illustration {
            display: none;
        }

        .course-thumbnail {
            width: 60px;
            height: 60px;
            font-size: 24px;
        }

        .course-progress-item {
            gap: 12px;
        }
    }

    @media (max-width: 576px) {
        .activity-status {
            display: none;
        }

        .course-bottom-info {
            font-size: 10px;
        }

        .student-card-header,
        .student-card-body {
            padding: 17px;
        }
    }
</style>
@endpush
