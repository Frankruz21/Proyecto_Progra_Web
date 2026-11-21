<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula Virtual - UniLearning</title>
    <!-- Bootstrap 5 y Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --unilearning-primary: #143D60;
            --unilearning-accent: #A0C878;
            --unilearning-light: #DDEB9D;
            --bg-body: #f4f6f9;
        }
        body {
            background-color: var(--bg-body);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .header-aula {
            background-color: var(--unilearning-primary);
            color: white;
            padding: 15px 30px;
            border-radius: 0 0 20px 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .sidebar-aula {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            height: fit-content;
        }
        .sidebar-aula .course-title {
            font-weight: bold;
            color: var(--unilearning-primary);
            font-size: 1.1rem;
        }
        .progress {
            height: 8px;
            background-color: #e9ecef;
        }
        .progress-bar {
            background-color: var(--unilearning-accent);
        }
        .module-title {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 15px;
            margin-bottom: 5px;
            font-size: 0.9rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }
        .lesson-item {
            padding: 8px 10px;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #555;
            display: flex;
            align-items: center;
            text-decoration: none;
            margin-bottom: 2px;
        }
        .lesson-item:hover {
            background-color: #f1f1f1;
        }
        .lesson-item.active {
            background-color: var(--unilearning-light);
            color: var(--unilearning-primary);
            font-weight: 600;
        }
        .lesson-item i {
            margin-right: 10px;
            color: var(--unilearning-accent);
        }
        .video-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .video-player {
            background-color: #000;
            border-radius: 10px;
            aspect-ratio: 16/9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 15px;
        }
        .video-player img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.7;
        }
        .video-controls {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 15px;
            display: flex;
            align-items: center;
            color: white;
            gap: 15px;
        }
        .btn-completar {
            background-color: var(--unilearning-accent);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }
        .btn-completar:hover {
            background-color: #8cb366;
            color: white;
        }
        .nav-tabs .nav-link {
            color: #666;
            border: none;
            border-bottom: 2px solid transparent;
        }
        .nav-tabs .nav-link.active {
            color: var(--unilearning-primary);
            border-bottom: 2px solid var(--unilearning-primary);
            background: transparent;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- Header Superior -->
    <div class="header-aula">
        <i class="bi bi-play-circle fs-3 me-3"></i>
        <h4 class="mb-0 fw-bold">Aula Virtual - Visor de Lecciones</h4>
    </div>

    <div class="container-fluid px-4 pb-5">
        <div class="row g-4">
            
            <!-- Columna Izquierda: Sidebar del Curso -->
            <div class="col-lg-3 col-md-4">
                <div class="sidebar-aula">
                    <a href="#" class="text-muted text-decoration-none small mb-3 d-block">
                        <i class="bi bi-arrow-left"></i> Volver a Mis Cursos
                    </a>
                    
                    <h5 class="course-title mb-2">Desarrollo Web con Laravel</h5>
                    
                    <div class="d-flex justify-content-between text-muted small mb-1">
                        <span>Progreso del curso</span>
                        <span class="fw-bold">75%</span>
                    </div>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <!-- Módulo 1 -->
                    <div class="module-title">
                        Módulo 1: Fundamentos <i class="bi bi-chevron-up"></i>
                    </div>
                    <a href="#" class="lesson-item">
                        <i class="bi bi-check-circle-fill"></i> 1. Introducción
                    </a>
                    <a href="#" class="lesson-item">
                        <i class="bi bi-check-circle-fill"></i> 2. Instalación de Laravel
                    </a>
                    <a href="#" class="lesson-item active">
                        <i class="bi bi-check-circle-fill"></i> 3. Estructura del proyecto
                    </a>

                    <!-- Módulo 2 -->
                    <div class="module-title">
                        Módulo 2: Rutas y Controladores <i class="bi bi-chevron-down"></i>
                    </div>
                    
                    <!-- Módulo 3 -->
                    <div class="module-title">
                        Módulo 3: Vistas Blade <i class="bi bi-chevron-down"></i>
                    </div>

                    <!-- Módulo 4 -->
                    <div class="module-title">
                        Módulo 4: Base de Datos <i class="bi bi-chevron-down"></i>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Contenido de la Lección -->
            <div class="col-lg-9 col-md-8">
                <div class="video-container">
                    
                    <!-- Breadcrumb -->
                    <div class="text-muted small mb-3">
                        <span class="fw-bold text-dark">Módulo 1: Fundamentos</span> <br>
                        <span class="fs-5 text-dark fw-bold">3. Estructura del proyecto</span>
                    </div>

                    <!-- Reproductor de Video (Simulado) -->
                    <div class="video-player">
                        <!-- Imagen de fondo simulando el video -->
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="Video" style="object-fit: contain; width: 40%; opacity: 1; background: #0f172a;">
                        
                        <!-- Controles del video -->
                        <div class="video-controls">
                            <i class="bi bi-play-fill fs-4 cursor-pointer"></i>
                            <i class="bi bi-skip-forward-fill cursor-pointer"></i>
                            <span class="small ms-2">0:00 / 10:24</span>
                            <div class="ms-auto d-flex gap-3">
                                <i class="bi bi-volume-up-fill cursor-pointer"></i>
                                <i class="bi bi-gear-fill cursor-pointer"></i>
                                <i class="bi bi-fullscreen cursor-pointer"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Pestañas (Tabs) -->
                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="descripcion-tab" data-bs-toggle="tab" data-bs-target="#descripcion" type="button" role="tab">Descripción</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="recursos-tab" data-bs-toggle="tab" data-bs-target="#recursos" type="button" role="tab">Recursos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tareas-tab" data-bs-toggle="tab" data-bs-target="#tareas" type="button" role="tab">Tareas</button>
                        </li>
                    </ul>

                    <!-- Contenido de las Pestañas -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Descripción -->
                        <div class="tab-pane fade show active" id="descripcion" role="tabpanel">
                            <p class="text-muted">
                                En esta lección conocerás la estructura de carpetas de un proyecto Laravel y la función de cada una. 
                                Aprenderás dónde van los controladores, las vistas, los modelos y cómo se organiza el código.
                            </p>
                        </div>
                        
                        <!-- Recursos -->
                        <div class="tab-pane fade" id="recursos" role="tabpanel">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-file-earmark-pdf text-danger me-2"></i> Guía de Estructura de Laravel.pdf</span>
                                    <i class="bi bi-download"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Tareas -->
                        <div class="tab-pane fade" id="tareas" role="tabpanel">
                            <p class="text-muted small">No hay tareas asignadas para esta lección.</p>
                        </div>
                    </div>

                    <!-- Botón de Completar -->
                    <div class="d-flex justify-content-end mt-4 border-top pt-4">
                        <button class="btn-completar">
                            <i class="bi bi-check2-circle"></i> Marcar como completada
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>