@extends('layouts.student')

@section('title', 'Mis cursos')

@section('page-title', 'Mis cursos')

@section('page-subtitle', 'Explora y continúa tu aprendizaje')

@section('active-cursos', 'active')

@section('content')

<div class="student-courses-page">

    {{-- Encabezado --}}
    <div class="courses-header">
        <div>
            <h2>Mis cursos</h2>
            <p>Todos tus cursos en un solo lugar. ¡Continúa aprendiendo!</p>
        </div>

        <div class="courses-header-icon">
            <i class="bi bi-book-half"></i>
        </div>
    </div>

    {{-- Estadísticas --}}
    <div class="courses-stats">

        <div class="course-stat-card">
            <div class="course-stat-icon blue">
                <i class="bi bi-collection"></i>
            </div>

            <div>
                <span class="stat-label">Total de cursos</span>
                <h3>4</h3>
            </div>
        </div>

        <div class="course-stat-card">
            <div class="course-stat-icon green">
                <i class="bi bi-play-circle"></i>
            </div>

            <div>
                <span class="stat-label">En progreso</span>
                <h3>2</h3>
            </div>
        </div>

        <div class="course-stat-card">
            <div class="course-stat-icon purple">
                <i class="bi bi-check-circle"></i>
            </div>

            <div>
                <span class="stat-label">Completados</span>
                <h3>1</h3>
            </div>
        </div>

        <div class="course-stat-card">
            <div class="course-stat-icon orange">
                <i class="bi bi-clock-history"></i>
            </div>

            <div>
                <span class="stat-label">Pendientes</span>
                <h3>1</h3>
            </div>
        </div>

    </div>

    {{-- Buscador y filtros --}}
    <div class="courses-toolbar">

        <div class="courses-search">
            <i class="bi bi-search"></i>

            <input
                type="text"
                id="courseSearch"
                placeholder="Buscar un curso..."
            >
        </div>

        <div class="courses-filters">

            <button class="course-filter active" data-filter="all">
                Todos
            </button>

            <button class="course-filter" data-filter="progress">
                En progreso
            </button>

            <button class="course-filter" data-filter="completed">
                Completados
            </button>

            <button class="course-filter" data-filter="pending">
                Pendientes
            </button>

        </div>

    </div>

    {{-- Cursos --}}
    <div class="courses-section">

        <div class="courses-section-heading">
            <div>
                <h3>Contenido de aprendizaje</h3>
                <p>Selecciona un curso para continuar</p>
            </div>

            <span class="courses-count">
                <i class="bi bi-book"></i>
                <span id="coursesCount">4 cursos</span>
            </span>
        </div>

        <div class="courses-grid" id="coursesGrid">

            {{-- Curso 1 --}}
            <article class="student-course-card"
                     data-status="progress"
                     data-name="fundamentos de programación">

                <div class="course-card-cover course-cover-blue">

                    <div class="course-cover-decoration decoration-one"></div>
                    <div class="course-cover-decoration decoration-two"></div>

                    <div class="course-cover-content">
                        <span class="course-category">
                            PROGRAMACIÓN
                        </span>

                        <div class="course-cover-icon">
                            <i class="bi bi-code-slash"></i>
                        </div>

                        <h3>Fundamentos de programación</h3>
                    </div>

                    <span class="course-status-badge status-progress">
                        <i class="bi bi-play-circle"></i>
                        En progreso
                    </span>

                </div>

                <div class="course-card-body">

                    <div class="course-instructor">
                        <div class="instructor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <span>Instructor del curso</span>
                    </div>

                    <div class="course-progress-info">
                        <span>Progreso del curso</span>
                        <strong>65%</strong>
                    </div>

                    <div class="course-progress-bar">
                        <div class="progress-fill progress-blue"
                             style="width: 65%"></div>
                    </div>

                    <div class="course-card-meta">
                        <span>
                            <i class="bi bi-book"></i>
                            8 lecciones
                        </span>

                        <span>
                            <i class="bi bi-clock"></i>
                            12 horas
                        </span>
                    </div>

                    <a href="#" class="course-action-button">
                        Continuar aprendiendo
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </article>


            {{-- Curso 2 --}}
            <article class="student-course-card"
                     data-status="progress"
                     data-name="diseño web básico">

                <div class="course-card-cover course-cover-green">

                    <div class="course-cover-decoration decoration-one"></div>
                    <div class="course-cover-decoration decoration-two"></div>

                    <div class="course-cover-content">
                        <span class="course-category">
                            DISEÑO WEB
                        </span>

                        <div class="course-cover-icon">
                            <i class="bi bi-palette"></i>
                        </div>

                        <h3>Diseño web básico</h3>
                    </div>

                    <span class="course-status-badge status-progress">
                        <i class="bi bi-play-circle"></i>
                        En progreso
                    </span>

                </div>

                <div class="course-card-body">

                    <div class="course-instructor">
                        <div class="instructor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <span>Instructor del curso</span>
                    </div>

                    <div class="course-progress-info">
                        <span>Progreso del curso</span>
                        <strong>30%</strong>
                    </div>

                    <div class="course-progress-bar">
                        <div class="progress-fill progress-green"
                             style="width: 30%"></div>
                    </div>

                    <div class="course-card-meta">
                        <span>
                            <i class="bi bi-book"></i>
                            10 lecciones
                        </span>

                        <span>
                            <i class="bi bi-clock"></i>
                            15 horas
                        </span>
                    </div>

                    <a href="#" class="course-action-button">
                        Continuar aprendiendo
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </article>


            {{-- Curso 3 --}}
            <article class="student-course-card"
                     data-status="completed"
                     data-name="herramientas digitales">

                <div class="course-card-cover course-cover-purple">

                    <div class="course-cover-decoration decoration-one"></div>
                    <div class="course-cover-decoration decoration-two"></div>

                    <div class="course-cover-content">
                        <span class="course-category">
                            TECNOLOGÍA
                        </span>

                        <div class="course-cover-icon">
                            <i class="bi bi-laptop"></i>
                        </div>

                        <h3>Herramientas digitales</h3>
                    </div>

                    <span class="course-status-badge status-completed">
                        <i class="bi bi-check-circle-fill"></i>
                        Completado
                    </span>

                </div>

                <div class="course-card-body">

                    <div class="course-instructor">
                        <div class="instructor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <span>Instructor del curso</span>
                    </div>

                    <div class="course-progress-info">
                        <span>Progreso del curso</span>
                        <strong>100%</strong>
                    </div>

                    <div class="course-progress-bar">
                        <div class="progress-fill progress-purple"
                             style="width: 100%"></div>
                    </div>

                    <div class="course-card-meta">
                        <span>
                            <i class="bi bi-book"></i>
                            6 lecciones
                        </span>

                        <span>
                            <i class="bi bi-clock"></i>
                            8 horas
                        </span>
                    </div>

                    <a href="#" class="course-action-button completed-action">
                        Ver curso
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </article>


            {{-- Curso 4 --}}
            <article class="student-course-card"
                     data-status="pending"
                     data-name="introducción a bases de datos">

                <div class="course-card-cover course-cover-orange">

                    <div class="course-cover-decoration decoration-one"></div>
                    <div class="course-cover-decoration decoration-two"></div>

                    <div class="course-cover-content">
                        <span class="course-category">
                            BASES DE DATOS
                        </span>

                        <div class="course-cover-icon">
                            <i class="bi bi-database"></i>
                        </div>

                        <h3>Introducción a bases de datos</h3>
                    </div>

                    <span class="course-status-badge status-pending">
                        <i class="bi bi-hourglass-split"></i>
                        Pendiente
                    </span>

                </div>

                <div class="course-card-body">

                    <div class="course-instructor">
                        <div class="instructor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <span>Instructor del curso</span>
                    </div>

                    <div class="course-progress-info">
                        <span>Progreso del curso</span>
                        <strong>0%</strong>
                    </div>

                    <div class="course-progress-bar">
                        <div class="progress-fill progress-orange"
                             style="width: 0%"></div>
                    </div>

                    <div class="course-card-meta">
                        <span>
                            <i class="bi bi-book"></i>
                            9 lecciones
                        </span>

                        <span>
                            <i class="bi bi-clock"></i>
                            10 horas
                        </span>
                    </div>

                    <a href="#" class="course-action-button pending-action">
                        Iniciar curso
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </article>

        </div>

        {{-- Estado sin resultados --}}
        <div class="courses-empty-state" id="coursesEmpty" style="display: none;">

            <div class="empty-icon">
                <i class="bi bi-search"></i>
            </div>

            <h4>No encontramos cursos</h4>

            <p>
                Intenta buscar con otro nombre o selecciona otro filtro.
            </p>

        </div>

    </div>

</div>

@endsection

@push('styles')
<style>

    .student-courses-page {
        padding-bottom: 25px;
    }

    /* Encabezado */
    .courses-header {
        background: linear-gradient(135deg, #143D60, #27667B);
        border-radius: 22px;
        padding: 28px 32px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .courses-header h2 {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .courses-header p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .courses-header-icon {
        width: 75px;
        height: 75px;
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 35px;
        z-index: 1;
    }

    /* Estadísticas */
    .courses-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 25px;
    }

    .course-stat-card {
        background: white;
        border-radius: 18px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 4px 15px rgba(20,61,96,.05);
        border: 1px solid #edf1f5;
    }

    .course-stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        flex-shrink: 0;
    }

    .course-stat-icon.blue {
        background: #e7f1fa;
        color: #143D60;
    }

    .course-stat-icon.green {
        background: #eaf5e2;
        color: #5c8b3d;
    }

    .course-stat-icon.purple {
        background: #f0eaff;
        color: #7856b5;
    }

    .course-stat-icon.orange {
        background: #fff0df;
        color: #d88937;
    }

    .stat-label {
        color: #718096;
        font-size: 12px;
        display: block;
        margin-bottom: 5px;
    }

    .course-stat-card h3 {
        margin: 0;
        font-size: 25px;
        font-weight: 700;
        color: #143D60;
    }

    /* Toolbar */
    .courses-toolbar {
        background: white;
        border: 1px solid #edf1f5;
        border-radius: 18px;
        padding: 18px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .courses-search {
        position: relative;
        width: 300px;
        max-width: 100%;
    }

    .courses-search i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #8a99a8;
    }

    .courses-search input {
        width: 100%;
        padding: 11px 15px 11px 42px;
        border: 1px solid #e3e9ef;
        border-radius: 12px;
        outline: none;
        font-size: 13px;
        transition: .2s;
    }

    .courses-search input:focus {
        border-color: #27667B;
        box-shadow: 0 0 0 3px rgba(39,102,123,.1);
    }

    .courses-filters {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .course-filter {
        border: 1px solid #e5eaf0;
        background: #fff;
        color: #718096;
        padding: 9px 15px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 600;
        transition: .2s;
    }

    .course-filter:hover {
        border-color: #27667B;
        color: #27667B;
    }

    .course-filter.active {
        background: #143D60;
        color: white;
        border-color: #143D60;
    }

    /* Encabezado de sección */
    .courses-section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .courses-section-heading h3 {
        font-size: 19px;
        color: #143D60;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .courses-section-heading p {
        font-size: 13px;
        color: #8492a6;
        margin: 0;
    }

    .courses-count {
        color: #718096;
        background: white;
        border: 1px solid #edf1f5;
        padding: 9px 13px;
        border-radius: 10px;
        font-size: 12px;
    }

    .courses-count i {
        margin-right: 5px;
        color: #27667B;
    }

    /* Grid */
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
    }

    /* Tarjetas */
    .student-course-card {
        background: white;
        border: 1px solid #edf1f5;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(20,61,96,.04);
        transition: transform .25s, box-shadow .25s;
    }

    .student-course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(20,61,96,.1);
    }

    /* Portadas */
    .course-card-cover {
        height: 210px;
        position: relative;
        overflow: hidden;
        padding: 25px;
        color: white;
    }

    .course-cover-blue {
        background: linear-gradient(135deg, #143D60, #367c9a);
    }

    .course-cover-green {
        background: linear-gradient(135deg, #497b55, #A0C878);
    }

    .course-cover-purple {
        background: linear-gradient(135deg, #6752a5, #a48be2);
    }

    .course-cover-orange {
        background: linear-gradient(135deg, #b96b31, #e8a45e);
    }

    .course-cover-decoration {
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
    }

    .decoration-one {
        width: 180px;
        height: 180px;
        right: -45px;
        top: -65px;
    }

    .decoration-two {
        width: 110px;
        height: 110px;
        right: 65px;
        bottom: -65px;
    }

    .course-cover-content {
        position: relative;
        z-index: 1;
    }

    .course-category {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.5px;
        opacity: .85;
    }

    .course-cover-icon {
        font-size: 34px;
        margin: 13px 0;
    }

    .course-cover-content h3 {
        font-size: 20px;
        font-weight: 700;
        max-width: 250px;
        margin: 0;
        line-height: 1.3;
    }

    /* Estados */
    .course-status-badge {
        position: absolute;
        right: 15px;
        bottom: 15px;
        z-index: 2;
        padding: 7px 11px;
        border-radius: 9px;
        font-size: 10px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .status-progress {
        background: rgba(255,255,255,.95);
        color: #27667B;
    }

    .status-completed {
        background: #eaf5e2;
        color: #4c7e34;
    }

    .status-pending {
        background: #fff1df;
        color: #b9732e;
    }

    /* Cuerpo */
    .course-card-body {
        padding: 22px;
    }

    .course-instructor {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #718096;
        font-size: 12px;
        margin-bottom: 22px;
    }

    .instructor-avatar {
        width: 33px;
        height: 33px;
        background: #eaf1f6;
        color: #27667B;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .course-progress-info {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        color: #718096;
        margin-bottom: 9px;
    }

    .course-progress-info strong {
        color: #143D60;
        font-weight: 700;
    }

    .course-progress-bar {
        width: 100%;
        height: 8px;
        background: #edf1f5;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 18px;
    }

    .progress-fill {
        height: 100%;
        border-radius: 20px;
    }

    .progress-blue {
        background: #27667B;
    }

    .progress-green {
        background: #75a85c;
    }

    .progress-purple {
        background: #9276cf;
    }

    .progress-orange {
        background: #df9a51;
    }

    .course-card-meta {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 20px;
        font-size: 11px;
        color: #8492a6;
    }

    .course-card-meta i {
        color: #27667B;
        margin-right: 4px;
    }

    /* Botones */
    .course-action-button {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #143D60;
        color: white;
        text-decoration: none;
        padding: 12px 15px;
        border-radius: 11px;
        font-size: 12px;
        font-weight: 600;
        transition: .2s;
    }

    .course-action-button:hover {
        background: #27667B;
        color: white;
        transform: translateY(-1px);
    }

    .completed-action {
        background: #eef5e9;
        color: #5c8b3d;
    }

    .completed-action:hover {
        background: #e0eed5;
        color: #4c7e34;
    }

    .pending-action {
        background: #fff3e5;
        color: #b9732e;
    }

    .pending-action:hover {
        background: #ffe8cc;
        color: #a66020;
    }

    /* Estado vacío */
    .courses-empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border: 1px solid #edf1f5;
        border-radius: 20px;
    }

    .empty-icon {
        width: 70px;
        height: 70px;
        background: #eaf1f6;
        color: #27667B;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        border-radius: 20px;
        margin: 0 auto 20px;
    }

    .courses-empty-state h4 {
        color: #143D60;
        font-weight: 700;
    }

    .courses-empty-state p {
        color: #8492a6;
        font-size: 13px;
    }

    /* Responsive */
    @media (max-width: 1100px) {
        .courses-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .courses-header {
            padding: 23px;
        }

        .courses-header h2 {
            font-size: 22px;
        }

        .courses-header-icon {
            width: 60px;
            height: 60px;
            font-size: 27px;
        }

        .courses-toolbar {
            align-items: stretch;
        }

        .courses-search {
            width: 100%;
        }

        .courses-filters {
            width: 100%;
        }

        .course-filter {
            flex: 1;
        }

        .courses-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .courses-stats {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .course-stat-card {
            padding: 14px;
            gap: 10px;
        }

        .course-stat-icon {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }

        .course-stat-card h3 {
            font-size: 21px;
        }

        .stat-label {
            font-size: 10px;
        }

        .courses-section-heading {
            align-items: flex-start;
            gap: 10px;
        }

        .courses-count {
            white-space: nowrap;
        }

        .course-card-cover {
            height: 195px;
        }

        .course-card-body {
            padding: 18px;
        }

        .course-card-meta {
            font-size: 10px;
        }
    }

</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('courseSearch');
    const filterButtons = document.querySelectorAll('.course-filter');
    const courseCards = document.querySelectorAll('.student-course-card');
    const emptyState = document.getElementById('coursesEmpty');
    const coursesCount = document.getElementById('coursesCount');

    let activeFilter = 'all';

    function filterCourses() {

        const searchText = searchInput.value.toLowerCase().trim();

        let visibleCourses = 0;

        courseCards.forEach(card => {

            const courseName = card.dataset.name.toLowerCase();
            const courseStatus = card.dataset.status;

            const matchesSearch = courseName.includes(searchText);

            const matchesFilter =
                activeFilter === 'all' ||
                courseStatus === activeFilter;

            const shouldShow = matchesSearch && matchesFilter;

            card.style.display = shouldShow ? '' : 'none';

            if (shouldShow) {
                visibleCourses++;
            }

        });

        coursesCount.textContent =
            visibleCourses + (visibleCourses === 1 ? ' curso' : ' cursos');

        emptyState.style.display =
            visibleCourses === 0 ? 'block' : 'none';

    }

    // Búsqueda
    searchInput.addEventListener('input', filterCourses);

    // Filtros
    filterButtons.forEach(button => {

        button.addEventListener('click', function () {

            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            this.classList.add('active');

            activeFilter = this.dataset.filter;

            filterCourses();

        });

    });

});
</script>
@endpush