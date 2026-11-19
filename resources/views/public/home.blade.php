@extends('layouts.public')

@section('title', 'UniLearning | Aprende. Conecta. Crece.')

@section('description', 'Descubre cursos en línea, aprende nuevas habilidades y desarrolla tu potencial con UniLearning.')

@section('content')

    

    {{-- ================= HERO ================= --}}
    <section class="home-hero py-5">
        <div class="container py-lg-5">
            <div class="row align-items-center">

                {{-- Texto principal --}}
                <div class="col-lg-6 mb-5 mb-lg-0">

                    <span class="hero-badge mb-3 d-inline-block">
                        <i class="bi bi-stars me-2"></i>
                        Tu futuro comienza aquí
                    </span>

                    <h1 class="hero-title mb-4">
                        Aprende hoy,
                        <span>transforma tu futuro.</span>
                    </h1>

                    <p class="hero-description mb-4">
                        Explora cursos en línea, desarrolla nuevas habilidades
                        y alcanza tus metas profesionales con una experiencia
                        de aprendizaje diseñada para ti.
                    </p>

                    <div class="d-flex flex-wrap gap-3">

                        <a href="#cursos" class="btn btn-unilearning btn-lg">
                            Explorar cursos
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                        <a href="#beneficios" class="btn btn-unilearning-outline btn-lg">
                            Conoce UniLearning
                        </a>

                    </div>

                    {{-- Indicadores --}}
                    <div class="hero-stats mt-5">

                        <div class="row">

                            <div class="col-4">
                                <h3>+50</h3>
                                <p>Cursos</p>
                            </div>

                            <div class="col-4">
                                <h3>+1,000</h3>
                                <p>Estudiantes</p>
                            </div>

                            <div class="col-4">
                                <h3>+20</h3>
                                <p>Instructores</p>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Área visual del Hero --}}
                <div class="col-lg-6">

                    <div class="hero-visual">

                        <div class="hero-circle"></div>

                        {{-- Tarjeta principal --}}
                        <div class="learning-card">

                            <div class="learning-card-header">
                                <div>
                                    <span class="learning-label">
                                        Tu aprendizaje
                                    </span>

                                    <h4>Continúa creciendo</h4>
                                </div>

                                <div class="learning-icon">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                            </div>

                            <div class="learning-progress mt-4">

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Progreso general</span>
                                    <strong>75%</strong>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar"
                                         style="width: 75%;">
                                    </div>
                                </div>

                            </div>

                            <div class="learning-course mt-4">

                                <div class="course-icon">
                                    <i class="bi bi-code-slash"></i>
                                </div>

                                <div>
                                    <h6>Desarrollo Web</h6>
                                    <small>12 lecciones disponibles</small>
                                </div>

                                <i class="bi bi-arrow-right ms-auto"></i>

                            </div>

                            <div class="learning-course mt-3">

                                <div class="course-icon green">
                                    <i class="bi bi-bar-chart-fill"></i>
                                </div>

                                <div>
                                    <h6>Marketing Digital</h6>
                                    <small>8 lecciones disponibles</small>
                                </div>

                                <i class="bi bi-arrow-right ms-auto"></i>

                            </div>

                        </div>

                        {{-- Tarjeta flotante --}}
                        <div class="hero-floating-card">

                            <div class="floating-icon">
                                <i class="bi bi-award-fill"></i>
                            </div>

                            <div>
                                <strong>¡Sigue adelante!</strong>
                                <p class="mb-0">Tu esfuerzo te llevará lejos.</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- ================= BUSCADOR ================= --}}
    <section class="search-section">
        <div class="container">

            <div class="search-box">

                <div class="row align-items-center">

                    <div class="col-lg-9">

                        <div class="input-group search-input-group">

                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>

                            <input type="text"
                                   class="form-control"
                                   placeholder="¿Qué te gustaría aprender?">

                        </div>

                    </div>

                    <div class="col-lg-3 mt-3 mt-lg-0">

                        <a href="#cursos"
                           class="btn btn-unilearning w-100">
                            Buscar cursos
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- ================= CURSOS DESTACADOS ================= --}}
    <section class="courses-section py-5" id="cursos">
        <div class="container py-3">

            <div class="section-heading text-center mb-5">

                <span class="section-eyebrow">
                    APRENDE ALGO NUEVO
                </span>

                <h2 class="section-title mt-2">
                    Cursos destacados
                </h2>

                <p class="section-description">
                    Descubre cursos diseñados para ayudarte a desarrollar
                    habilidades y alcanzar tus objetivos.
                </p>

            </div>

            <div class="row">

                {{-- Curso 1 --}}
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="course-card h-100">

                        <div class="course-image course-image-blue">

                            <div class="course-image-content">
                                <i class="bi bi-code-slash"></i>
                                <span>DESARROLLO</span>
                            </div>

                            <span class="course-category">
                                Tecnología
                            </span>

                        </div>

                        <div class="course-card-body">

                            <div class="course-rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                4.9
                                <span>(120 opiniones)</span>
                            </div>

                            <h5>Desarrollo Web desde Cero</h5>

                            <p>
                                Aprende HTML, CSS y JavaScript para crear
                                tus primeras páginas web.
                            </p>

                            <div class="course-meta">

                                <span>
                                    <i class="bi bi-clock me-1"></i>
                                    20 horas
                                </span>

                                <span>
                                    <i class="bi bi-play-circle me-1"></i>
                                    25 lecciones
                                </span>

                            </div>

                            <div class="course-card-footer">

                                <div>
                                    <small>Instructor</small>
                                    <strong>Equipo UniLearning</strong>
                                </div>

                                <div class="course-price">
                                    $25.00
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Curso 2 --}}
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="course-card h-100">

                        <div class="course-image course-image-green">

                            <div class="course-image-content">
                                <i class="bi bi-graph-up-arrow"></i>
                                <span>NEGOCIOS</span>
                            </div>

                            <span class="course-category">
                                Marketing
                            </span>

                        </div>

                        <div class="course-card-body">

                            <div class="course-rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                4.8
                                <span>(95 opiniones)</span>
                            </div>

                            <h5>Marketing Digital</h5>

                            <p>
                                Conoce las estrategias digitales para
                                impulsar marcas y negocios.
                            </p>

                            <div class="course-meta">

                                <span>
                                    <i class="bi bi-clock me-1"></i>
                                    15 horas
                                </span>

                                <span>
                                    <i class="bi bi-play-circle me-1"></i>
                                    18 lecciones
                                </span>

                            </div>

                            <div class="course-card-footer">

                                <div>
                                    <small>Instructor</small>
                                    <strong>Equipo UniLearning</strong>
                                </div>

                                <div class="course-price">
                                    $30.00
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Curso 3 --}}
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="course-card h-100">

                        <div class="course-image course-image-petroleum">

                            <div class="course-image-content">
                                <i class="bi bi-database"></i>
                                <span>TECNOLOGÍA</span>
                            </div>

                            <span class="course-category">
                                Datos
                            </span>

                        </div>

                        <div class="course-card-body">

                            <div class="course-rating mb-2">
                                <i class="bi bi-star-fill"></i>
                                4.9
                                <span>(87 opiniones)</span>
                            </div>

                            <h5>Introducción a Bases de Datos</h5>

                            <p>
                                Aprende los fundamentos de las bases de datos
                                y cómo gestionar información.
                            </p>

                            <div class="course-meta">

                                <span>
                                    <i class="bi bi-clock me-1"></i>
                                    18 horas
                                </span>

                                <span>
                                    <i class="bi bi-play-circle me-1"></i>
                                    22 lecciones
                                </span>

                            </div>

                            <div class="course-card-footer">

                                <div>
                                    <small>Instructor</small>
                                    <strong>Equipo UniLearning</strong>
                                </div>

                                <div class="course-price">
                                    $28.00
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="text-center mt-3">

                <a href="#" class="btn btn-unilearning-outline">
                    Ver todos los cursos
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>
    </section>


    {{-- ================= BENEFICIOS ================= --}}
    <section class="benefits-section py-5" id="beneficios">
        <div class="container py-3">

            <div class="section-heading text-center mb-5">

                <span class="section-eyebrow">
                    ¿POR QUÉ UNILEARNING?
                </span>

                <h2 class="section-title mt-2">
                    Aprende a tu propio ritmo
                </h2>

                <p class="section-description">
                    Una experiencia educativa flexible, accesible
                    y diseñada para acompañarte en tu crecimiento.
                </p>

            </div>

            <div class="row">

                {{-- Beneficio 1 --}}
                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="benefit-card">

                        <div class="benefit-icon blue">
                            <i class="bi bi-laptop"></i>
                        </div>

                        <h5>Aula virtual</h5>

                        <p>
                            Accede a tus cursos y contenidos educativos
                            desde cualquier lugar.
                        </p>

                    </div>

                </div>


                {{-- Beneficio 2 --}}
                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="benefit-card">

                        <div class="benefit-icon green">
                            <i class="bi bi-clock-history"></i>
                        </div>

                        <h5>Aprende a tu ritmo</h5>

                        <p>
                            Organiza tu tiempo y avanza según tus
                            posibilidades y disponibilidad.
                        </p>

                    </div>

                </div>


                {{-- Beneficio 3 --}}
                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="benefit-card">

                        <div class="benefit-icon petroleum">
                            <i class="bi bi-award"></i>
                        </div>

                        <h5>Certificados</h5>

                        <p>
                            Obtén certificados que respalden tus
                            conocimientos y logros.
                        </p>

                    </div>

                </div>


                {{-- Beneficio 4 --}}
                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="benefit-card">

                        <div class="benefit-icon light-green">
                            <i class="bi bi-people"></i>
                        </div>

                        <h5>Comunidad</h5>

                        <p>
                            Forma parte de una comunidad que busca
                            aprender y crecer continuamente.
                        </p>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- ================= NOSOTROS ================= --}}
    <section class="about-section py-5" id="nosotros">
        <div class="container py-3">

            <div class="row align-items-center">

                <div class="col-lg-6 mb-4 mb-lg-0">

                    <div class="about-visual">

                        <div class="about-main-card">
                            <i class="bi bi-mortarboard-fill"></i>

                            <h3>El conocimiento<br>abre puertas.</h3>

                            <p>
                                Construye nuevas oportunidades
                                a través del aprendizaje.
                            </p>
                        </div>

                        <div class="about-decoration"></div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <span class="section-eyebrow">
                        SOBRE UNILEARNING
                    </span>

                    <h2 class="section-title mt-2 mb-4">
                        Educación que impulsa
                        <span class="text-petroleum">
                            nuevas oportunidades.
                        </span>
                    </h2>

                    <p class="about-description">
                        UniLearning es una plataforma de aprendizaje
                        en línea creada para facilitar el acceso a
                        conocimientos, cursos y experiencias educativas
                        que contribuyan al desarrollo personal y profesional.
                    </p>

                    <p class="about-description">
                        Nuestro objetivo es ofrecer una experiencia
                        educativa accesible, organizada e interactiva,
                        donde cada estudiante pueda avanzar,
                        aprender y alcanzar sus metas.
                    </p>

                    <a href="#cursos" class="btn btn-unilearning mt-3">
                        Comienza a aprender
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>

            </div>

        </div>
    </section>


    {{-- ================= TESTIMONIOS ================= --}}
    <section class="testimonials-section py-5">
        <div class="container py-3">

            <div class="section-heading text-center mb-5">

                <span class="section-eyebrow">
                    EXPERIENCIAS
                </span>

                <h2 class="section-title mt-2">
                    Lo que dicen nuestros estudiantes
                </h2>

                <p class="section-description">
                    El aprendizaje es una experiencia que transforma.
                </p>

            </div>

            <div class="row">

                {{-- Testimonio 1 --}}
                <div class="col-lg-4 mb-4">

                    <div class="testimonial-card h-100">

                        <div class="testimonial-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p>
                            "La plataforma me permitió aprender
                            nuevas habilidades y organizar mejor
                            mi tiempo de estudio."
                        </p>

                        <div class="testimonial-user">

                            <div class="testimonial-avatar">
                                <i class="bi bi-person-fill"></i>
                            </div>

                            <div>
                                <strong>Estudiante UniLearning</strong>
                                <small>Estudiante</small>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Testimonio 2 --}}
                <div class="col-lg-4 mb-4">

                    <div class="testimonial-card h-100">

                        <div class="testimonial-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p>
                            "Los contenidos son fáciles de seguir
                            y puedo avanzar desde cualquier lugar.
                            Me gusta mucho la experiencia."
                        </p>

                        <div class="testimonial-user">

                            <div class="testimonial-avatar green">
                                <i class="bi bi-person-fill"></i>
                            </div>

                            <div>
                                <strong>Estudiante UniLearning</strong>
                                <small>Estudiante</small>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Testimonio 3 --}}
                <div class="col-lg-4 mb-4">

                    <div class="testimonial-card h-100">

                        <div class="testimonial-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <p>
                            "Es una excelente oportunidad para
                            continuar formándome y aprender
                            cosas nuevas de manera flexible."
                        </p>

                        <div class="testimonial-user">

                            <div class="testimonial-avatar petroleum">
                                <i class="bi bi-person-fill"></i>
                            </div>

                            <div>
                                <strong>Estudiante UniLearning</strong>
                                <small>Estudiante</small>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- ================= CTA FINAL ================= --}}
    <section class="cta-section py-5">
        <div class="container">

            <div class="cta-card text-center">

                <span class="cta-icon">
                    <i class="bi bi-lightning-charge-fill"></i>
                </span>

                <h2>¿Listo para comenzar tu aprendizaje?</h2>

                <p>
                    Explora nuestros cursos y comienza a construir
                    el futuro que deseas.
                </p>

                <a href="#cursos" class="btn btn-unilearning btn-lg">
                    Explorar cursos
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>
    </section>

@endsection