@extends('layouts.student')

@section('title', 'Mis certificados')

@section('active-certificados', 'active')

@section('content')

<style>
    .certificates-page {
        padding-bottom: 30px;
    }

    .certificates-hero {
        background: linear-gradient(135deg, #143D60, #27667B);
        border-radius: 22px;
        padding: 32px;
        color: white;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
    }

    .certificates-hero::after {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        right: -70px;
        top: -80px;
    }

    .certificates-hero h1 {
        font-weight: 800;
        margin-bottom: 10px;
    }

    .certificates-hero p {
        margin-bottom: 0;
        opacity: .85;
        max-width: 600px;
    }

    .certificate-hero-icon {
        font-size: 70px;
        opacity: .9;
    }

    .certificate-stat-card {
        border: none;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 5px 20px rgba(20,61,96,.06);
        padding: 22px;
        height: 100%;
    }

    .certificate-stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 15px;
    }

    .certificate-stat-card h3 {
        font-size: 28px;
        font-weight: 800;
        color: #143D60;
        margin-bottom: 5px;
    }

    .certificate-stat-card p {
        color: #718096;
        margin: 0;
        font-size: 14px;
    }

    .certificate-toolbar {
        background: #fff;
        border-radius: 18px;
        padding: 20px;
        margin: 28px 0;
        box-shadow: 0 5px 20px rgba(20,61,96,.05);
    }

    .certificate-search {
        position: relative;
    }

    .certificate-search i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    .certificate-search input {
        padding-left: 42px;
        border-radius: 12px;
        min-height: 45px;
    }

    .certificate-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #e8eef3;
        box-shadow: 0 6px 22px rgba(20,61,96,.05);
        transition: transform .25s, box-shadow .25s;
        height: 100%;
    }

    .certificate-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(20,61,96,.12);
    }

    .certificate-card-header {
        background: linear-gradient(135deg, #143D60, #27667B);
        padding: 25px;
        text-align: center;
        color: white;
        position: relative;
    }

    .certificate-card-header::before,
    .certificate-card-header::after {
        content: "";
        position: absolute;
        width: 45px;
        height: 45px;
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 50%;
    }

    .certificate-card-header::before {
        top: -15px;
        left: -15px;
    }

    .certificate-card-header::after {
        bottom: -15px;
        right: -15px;
    }

    .certificate-medal {
        width: 70px;
        height: 70px;
        margin: 0 auto 12px;
        border-radius: 50%;
        background: rgba(255,255,255,.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 35px;
    }

    .certificate-card-header small {
        opacity: .8;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 11px;
    }

    .certificate-card-header h5 {
        margin: 8px 0 0;
        font-weight: 700;
    }

    .certificate-card-body {
        padding: 22px;
    }

    .certificate-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 13px;
        color: #64748b;
        font-size: 14px;
    }

    .certificate-info i {
        color: #27667B;
        width: 18px;
    }

    .certificate-code {
        background: #f1f7fa;
        padding: 10px 12px;
        border-radius: 10px;
        font-size: 12px;
        color: #27667B;
        margin: 16px 0;
        font-weight: 600;
        text-align: center;
    }

    .certificate-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #e9f7ed;
        color: #2d7a45;
        border-radius: 20px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 700;
    }

    .certificate-actions {
        display: flex;
        gap: 10px;
        margin-top: 18px;
    }

    .certificate-actions .btn {
        flex: 1;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-certificate-primary {
        background: #143D60;
        color: white;
        border: none;
    }

    .btn-certificate-primary:hover {
        background: #27667B;
        color: white;
    }

    .btn-certificate-outline {
        border: 1px solid #27667B;
        color: #27667B;
    }

    .btn-certificate-outline:hover {
        background: #27667B;
        color: white;
    }

    .certificate-empty-state {
        display: none;
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
    }

    .certificate-empty-state i {
        font-size: 55px;
        color: #a0c878;
    }

    .certificate-empty-state h4 {
        color: #143D60;
        margin-top: 15px;
    }

    @media (max-width: 768px) {
        .certificates-hero {
            padding: 25px;
        }

        .certificate-hero-icon {
            font-size: 45px;
        }

        .certificate-actions {
            flex-direction: column;
        }
    }
</style>

<div class="certificates-page">

    {{-- ENCABEZADO --}}
    <div class="certificates-hero">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1><i class="bi bi-award me-2"></i>Mis certificados</h1>
                <p>
                    Aquí encontrarás los certificados de los cursos que has completado.
                    ¡Cada certificado representa un logro en tu aprendizaje!
                </p>
            </div>
            <div class="col-md-4 text-center d-none d-md-block">
                <i class="bi bi-trophy certificate-hero-icon"></i>
            </div>
        </div>
    </div>

    {{-- ESTADÍSTICAS --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="certificate-stat-card">
                <div class="certificate-stat-icon" style="background:#e9f7ed;color:#65a35a;">
                    <i class="bi bi-award"></i>
                </div>
                <h3>3</h3>
                <p>Certificados obtenidos</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="certificate-stat-card">
                <div class="certificate-stat-icon" style="background:#eaf2f8;color:#27667B;">
                    <i class="bi bi-book"></i>
                </div>
                <h3>3</h3>
                <p>Cursos completados</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="certificate-stat-card">
                <div class="certificate-stat-icon" style="background:#fff4df;color:#d69b35;">
                    <i class="bi bi-download"></i>
                </div>
                <h3>3</h3>
                <p>Certificados disponibles</p>
            </div>
        </div>

    </div>

    {{-- BUSCADOR Y FILTROS --}}
    <div class="certificate-toolbar">
        <div class="row g-3 align-items-center">

            <div class="col-lg-7">
                <div class="certificate-search">
                    <i class="bi bi-search"></i>
                    <input
                        type="text"
                        id="certificateSearch"
                        class="form-control"
                        placeholder="Buscar certificado o curso..."
                    >
                </div>
            </div>

            <div class="col-lg-5">
                <select class="form-select" id="certificateFilter">
                    <option value="todos">Todos los certificados</option>
                    <option value="reciente">Más recientes</option>
                    <option value="antiguo">Más antiguos</option>
                </select>
            </div>

        </div>
    </div>

    {{-- CERTIFICADOS --}}
    <div class="row g-4" id="certificatesContainer">

        {{-- CERTIFICADO 1 --}}
        <div class="col-lg-4 col-md-6 certificate-item"
             data-course="fundamentos de programación"
             data-date="2026-11-10">

            <div class="certificate-card">

                <div class="certificate-card-header">
                    <div class="certificate-medal">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <small>Certificado de finalización</small>
                    <h5>Fundamentos de Programación</h5>
                </div>

                <div class="certificate-card-body">

                    <div class="certificate-info">
                        <i class="bi bi-person"></i>
                        <span>Estudiante Demo</span>
                    </div>

                    <div class="certificate-info">
                        <i class="bi bi-calendar-check"></i>
                        <span>10 de noviembre de 2026</span>
                    </div>

                    <div class="certificate-info">
                        <i class="bi bi-check-circle"></i>
                        <span>Curso completado</span>
                    </div>

                    <div class="certificate-code">
                        Código: UNI-2026-001
                    </div>

                    <span class="certificate-status">
                        <i class="bi bi-check-circle-fill"></i>
                        Disponible
                    </span>

                    <div class="certificate-actions">
                        <button class="btn btn-certificate-primary"
                                onclick="showCertificateDemo('Fundamentos de Programación')">
                            <i class="bi bi-eye me-1"></i> Ver
                        </button>

                        <button class="btn btn-certificate-outline"
                                onclick="showCertificateDemo('Fundamentos de Programación')">
                            <i class="bi bi-download me-1"></i> Descargar
                        </button>
                    </div>

                </div>
            </div>
        </div>

        {{-- CERTIFICADO 2 --}}
        <div class="col-lg-4 col-md-6 certificate-item"
             data-course="diseño web"
             data-date="2026-10-25">

            <div class="certificate-card">

                <div class="certificate-card-header">
                    <div class="certificate-medal">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <small>Certificado de finalización</small>
                    <h5>Diseño Web</h5>
                </div>

                <div class="certificate-card-body">

                    <div class="certificate-info">
                        <i class="bi bi-person"></i>
                        <span>Estudiante Demo</span>
                    </div>

                    <div class="certificate-info">
                        <i class="bi bi-calendar-check"></i>
                        <span>25 de octubre de 2026</span>
                    </div>

                    <div class="certificate-info">
                        <i class="bi bi-check-circle"></i>
                        <span>Curso completado</span>
                    </div>

                    <div class="certificate-code">
                        Código: UNI-2026-002
                    </div>

                    <span class="certificate-status">
                        <i class="bi bi-check-circle-fill"></i>
                        Disponible
                    </span>

                    <div class="certificate-actions">
                        <button class="btn btn-certificate-primary"
                                onclick="showCertificateDemo('Diseño Web')">
                            <i class="bi bi-eye me-1"></i> Ver
                        </button>

                        <button class="btn btn-certificate-outline"
                                onclick="showCertificateDemo('Diseño Web')">
                            <i class="bi bi-download me-1"></i> Descargar
                        </button>
                    </div>

                </div>
            </div>
        </div>

        {{-- CERTIFICADO 3 --}}
        <div class="col-lg-4 col-md-6 certificate-item"
             data-course="bases de datos"
             data-date="2026-09-15">

            <div class="certificate-card">

                <div class="certificate-card-header">
                    <div class="certificate-medal">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <small>Certificado de finalización</small>
                    <h5>Bases de Datos</h5>
                </div>

                <div class="certificate-card-body">

                    <div class="certificate-info">
                        <i class="bi bi-person"></i>
                        <span>Estudiante Demo</span>
                    </div>

                    <div class="certificate-info">
                        <i class="bi bi-calendar-check"></i>
                        <span>15 de septiembre de 2026</span>
                    </div>

                    <div class="certificate-info">
                        <i class="bi bi-check-circle"></i>
                        <span>Curso completado</span>
                    </div>

                    <div class="certificate-code">
                        Código: UNI-2026-003
                    </div>

                    <span class="certificate-status">
                        <i class="bi bi-check-circle-fill"></i>
                        Disponible
                    </span>

                    <div class="certificate-actions">
                        <button class="btn btn-certificate-primary"
                                onclick="showCertificateDemo('Bases de Datos')">
                            <i class="bi bi-eye me-1"></i> Ver
                        </button>

                        <button class="btn btn-certificate-outline"
                                onclick="showCertificateDemo('Bases de Datos')">
                            <i class="bi bi-download me-1"></i> Descargar
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- ESTADO VACÍO --}}
    <div class="certificate-empty-state" id="certificateEmpty">
        <i class="bi bi-search"></i>
        <h4>No encontramos certificados</h4>
        <p class="text-muted">
            Intenta buscar con otro nombre de curso.
        </p>
    </div>

</div>

@endsection

@push('scripts')
<script>
    const certificateSearch = document.getElementById('certificateSearch');
    const certificateFilter = document.getElementById('certificateFilter');
    const certificateItems = document.querySelectorAll('.certificate-item');
    const certificateEmpty = document.getElementById('certificateEmpty');

    function filterCertificates() {
        const searchText = certificateSearch.value.toLowerCase().trim();
        const filterValue = certificateFilter.value;

        let visibleCount = 0;

        certificateItems.forEach(item => {
            const course = item.dataset.course.toLowerCase();
            const matchesSearch = course.includes(searchText);

            if (matchesSearch) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        if (filterValue === 'reciente') {
            const items = Array.from(certificateItems);

            items.sort((a, b) => new Date(b.dataset.date) - new Date(a.dataset.date));

            items.forEach(item => {
                document.getElementById('certificatesContainer').appendChild(item);
            });
        }

        if (filterValue === 'antiguo') {
            const items = Array.from(certificateItems);

            items.sort((a, b) => new Date(a.dataset.date) - new Date(b.dataset.date));

            items.forEach(item => {
                document.getElementById('certificatesContainer').appendChild(item);
            });
        }

        certificateEmpty.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    certificateSearch.addEventListener('input', filterCertificates);
    certificateFilter.addEventListener('change', filterCertificates);

    function showCertificateDemo(courseName) {
        alert(
            'El certificado de "' + courseName + '" estará disponible para visualizar y descargar cuando conectemos esta vista con el backend.'
        );
    }
</script>
@endpush