@extends('layouts.student')

@section('title', 'Recursos de aprendizaje')

@section('active-recursos', 'active')

@section('content')

<div class="resources-page">

    {{-- Encabezado --}}
    <div class="resources-header">
        <div>
            <span class="resources-eyebrow">
                <i class="bi bi-folder2-open"></i>
                MATERIAL COMPLEMENTARIO
            </span>

            <h1>Recursos de aprendizaje</h1>

            <p>
                Encuentra materiales, guías y herramientas que te ayudarán
                a complementar tu aprendizaje.
            </p>
        </div>

        <div class="resources-header-icon">
            <i class="bi bi-journal-richtext"></i>
        </div>
    </div>

    {{-- Resumen --}}
    <div class="resources-summary">

        <div class="summary-card">
            <div class="summary-icon icon-blue">
                <i class="bi bi-folder2"></i>
            </div>

            <div>
                <span class="summary-label">Total de recursos</span>
                <h3>12</h3>
                <small>Materiales disponibles</small>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon icon-green">
                <i class="bi bi-file-earmark-pdf"></i>
            </div>

            <div>
                <span class="summary-label">Documentos</span>
                <h3>7</h3>
                <small>PDF y documentos</small>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon icon-purple">
                <i class="bi bi-play-circle"></i>
            </div>

            <div>
                <span class="summary-label">Multimedia</span>
                <h3>3</h3>
                <small>Videos y enlaces</small>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon icon-orange">
                <i class="bi bi-file-earmark-code"></i>
            </div>

            <div>
                <span class="summary-label">Ejercicios</span>
                <h3>2</h3>
                <small>Prácticas adicionales</small>
            </div>
        </div>

    </div>

    {{-- Buscador y filtros --}}
    <div class="resources-toolbar">

        <div class="resource-search">
            <i class="bi bi-search"></i>

            <input
                type="text"
                id="resourceSearch"
                placeholder="Buscar un recurso..."
            >
        </div>

        <select id="resourceTypeFilter">
            <option value="">Todos los tipos</option>
            <option value="pdf">PDF</option>
            <option value="documento">Documento</option>
            <option value="video">Video</option>
            <option value="enlace">Enlace</option>
            <option value="ejercicio">Ejercicio</option>
        </select>

        <select id="resourceCourseFilter">
            <option value="">Todos los cursos</option>
            <option value="programacion">Fundamentos de Programación</option>
            <option value="web">Diseño Web Básico</option>
            <option value="herramientas">Herramientas Digitales</option>
        </select>

    </div>

    {{-- Categorías --}}
    <div class="resources-categories">

        <button class="category-button active" data-category="all">
            <i class="bi bi-grid"></i>
            Todos
        </button>

        <button class="category-button" data-category="pdf">
            <i class="bi bi-file-earmark-pdf"></i>
            PDF
        </button>

        <button class="category-button" data-category="documento">
            <i class="bi bi-file-earmark-text"></i>
            Documentos
        </button>

        <button class="category-button" data-category="video">
            <i class="bi bi-play-circle"></i>
            Videos
        </button>

        <button class="category-button" data-category="enlace">
            <i class="bi bi-link-45deg"></i>
            Enlaces
        </button>

        <button class="category-button" data-category="ejercicio">
            <i class="bi bi-code-slash"></i>
            Ejercicios
        </button>

    </div>

    {{-- Título de sección --}}
    <div class="resources-section-heading">
        <div>
            <h2>Materiales disponibles</h2>
            <p>Recursos complementarios para tus cursos</p>
        </div>

        <span id="resourceCount" class="resource-count">
            8 recursos
        </span>
    </div>

    {{-- Recursos --}}
    <div class="resources-grid" id="resourcesGrid">

        {{-- Recurso 1 --}}
        <div
            class="resource-card"
            data-type="pdf"
            data-category="pdf"
            data-course="programacion"
            data-search="guía introducción programación fundamentos programación"
        >
            <div class="resource-card-top">
                <div class="resource-file-icon pdf-icon">
                    <i class="bi bi-file-earmark-pdf"></i>
                </div>

                <span class="resource-badge badge-pdf">PDF</span>
            </div>

            <h3>Guía de introducción a la programación</h3>

            <p>
                Conceptos básicos, algoritmos y fundamentos
                para comenzar a programar.
            </p>

            <div class="resource-course">
                <i class="bi bi-book"></i>
                Fundamentos de Programación
            </div>

            <div class="resource-card-footer">
                <span>
                    <i class="bi bi-file-earmark"></i>
                    2.4 MB
                </span>

                <button type="button" class="resource-action">
                    <i class="bi bi-download"></i>
                    Descargar
                </button>
            </div>
        </div>

        {{-- Recurso 2 --}}
        <div
            class="resource-card"
            data-type="documento"
            data-category="documento"
            data-course="programacion"
            data-search="pseudocódigo ejercicios algoritmos programación"
        >
            <div class="resource-card-top">
                <div class="resource-file-icon document-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>

                <span class="resource-badge badge-document">Documento</span>
            </div>

            <h3>Ejercicios de pseudocódigo</h3>

            <p>
                Actividades prácticas para desarrollar la lógica
                de programación.
            </p>

            <div class="resource-course">
                <i class="bi bi-book"></i>
                Fundamentos de Programación
            </div>

            <div class="resource-card-footer">
                <span>
                    <i class="bi bi-file-earmark"></i>
                    850 KB
                </span>

                <button type="button" class="resource-action">
                    <i class="bi bi-download"></i>
                    Descargar
                </button>
            </div>
        </div>

        {{-- Recurso 3 --}}
        <div
            class="resource-card"
            data-type="video"
            data-category="video"
            data-course="programacion"
            data-search="video algoritmos variables programación"
        >
            <div class="resource-card-top">
                <div class="resource-file-icon video-icon">
                    <i class="bi bi-play-circle"></i>
                </div>

                <span class="resource-badge badge-video">Video</span>
            </div>

            <h3>Variables y tipos de datos</h3>

            <p>
                Repaso audiovisual sobre variables,
                constantes y tipos de datos.
            </p>

            <div class="resource-course">
                <i class="bi bi-book"></i>
                Fundamentos de Programación
            </div>

            <div class="resource-card-footer">
                <span>
                    <i class="bi bi-clock"></i>
                    18 minutos
                </span>

                <button type="button" class="resource-action">
                    <i class="bi bi-play-fill"></i>
                    Ver recurso
                </button>
            </div>
        </div>

        {{-- Recurso 4 --}}
        <div
            class="resource-card"
            data-type="pdf"
            data-category="pdf"
            data-course="web"
            data-search="guía html estructura páginas web diseño web"
        >
            <div class="resource-card-top">
                <div class="resource-file-icon pdf-icon">
                    <i class="bi bi-file-earmark-pdf"></i>
                </div>

                <span class="resource-badge badge-pdf">PDF</span>
            </div>

            <h3>Guía de HTML</h3>

            <p>
                Elementos, etiquetas y estructura básica
                para crear páginas web.
            </p>

            <div class="resource-course">
                <i class="bi bi-book"></i>
                Diseño Web Básico
            </div>

            <div class="resource-card-footer">
                <span>
                    <i class="bi bi-file-earmark"></i>
                    1.8 MB
                </span>

                <button type="button" class="resource-action">
                    <i class="bi bi-download"></i>
                    Descargar
                </button>
            </div>
        </div>

        {{-- Recurso 5 --}}
        <div
            class="resource-card"
            data-type="enlace"
            data-category="enlace"
            data-course="web"
            data-search="enlace recursos html css documentación web"
        >
            <div class="resource-card-top">
                <div class="resource-file-icon link-icon">
                    <i class="bi bi-link-45deg"></i>
                </div>

                <span class="resource-badge badge-link">Enlace</span>
            </div>

            <h3>Documentación HTML y CSS</h3>

            <p>
                Consulta documentación y referencias
                para el desarrollo web.
            </p>

            <div class="resource-course">
                <i class="bi bi-book"></i>
                Diseño Web Básico
            </div>

            <div class="resource-card-footer">
                <span>
                    <i class="bi bi-globe"></i>
                    Recurso externo
                </span>

                <button type="button" class="resource-action">
                    <i class="bi bi-box-arrow-up-right"></i>
                    Abrir
                </button>
            </div>
        </div>

        {{-- Recurso 6 --}}
        <div
            class="resource-card"
            data-type="ejercicio"
            data-category="ejercicio"
            data-course="web"
            data-search="práctica ejercicios html formulario diseño web"
        >
            <div class="resource-card-top">
                <div class="resource-file-icon exercise-icon">
                    <i class="bi bi-code-slash"></i>
                </div>

                <span class="resource-badge badge-exercise">Ejercicio</span>
            </div>

            <h3>Práctica: crear un formulario</h3>

            <p>
                Desarrolla un formulario utilizando
                diferentes elementos HTML.
            </p>

            <div class="resource-course">
                <i class="bi bi-book"></i>
                Diseño Web Básico
            </div>

            <div class="resource-card-footer">
                <span>
                    <i class="bi bi-file-earmark-code"></i>
                    Práctica
                </span>

                <button type="button" class="resource-action">
                    <i class="bi bi-download"></i>
                    Descargar
                </button>
            </div>
        </div>

        {{-- Recurso 7 --}}
        <div
            class="resource-card"
            data-type="pdf"
            data-category="pdf"
            data-course="herramientas"
            data-search="atajos teclado herramientas digitales productividad"
        >
            <div class="resource-card-top">
                <div class="resource-file-icon pdf-icon">
                    <i class="bi bi-file-earmark-pdf"></i>
                </div>

                <span class="resource-badge badge-pdf">PDF</span>
            </div>

            <h3>Guía de atajos de teclado</h3>

            <p>
                Atajos útiles para mejorar tu productividad
                en herramientas digitales.
            </p>

            <div class="resource-course">
                <i class="bi bi-book"></i>
                Herramientas Digitales
            </div>

            <div class="resource-card-footer">
                <span>
                    <i class="bi bi-file-earmark"></i>
                    620 KB
                </span>

                <button type="button" class="resource-action">
                    <i class="bi bi-download"></i>
                    Descargar
                </button>
            </div>
        </div>

        {{-- Recurso 8 --}}
        <div
            class="resource-card"
            data-type="documento"
            data-category="documento"
            data-course="herramientas"
            data-search="organización trabajo digital productividad documento"
        >
            <div class="resource-card-top">
                <div class="resource-file-icon document-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>

                <span class="resource-badge badge-document">Documento</span>
            </div>

            <h3>Organización del trabajo digital</h3>

            <p>
                Consejos para organizar archivos,
                carpetas y documentos.
            </p>

            <div class="resource-course">
                <i class="bi bi-book"></i>
                Herramientas Digitales
            </div>

            <div class="resource-card-footer">
                <span>
                    <i class="bi bi-file-earmark"></i>
                    950 KB
                </span>

                <button type="button" class="resource-action">
                    <i class="bi bi-download"></i>
                    Descargar
                </button>
            </div>
        </div>

    </div>

    {{-- Estado vacío --}}
    <div class="resources-empty" id="resourcesEmpty" style="display: none;">
        <div class="empty-icon">
            <i class="bi bi-search"></i>
        </div>

        <h3>No encontramos recursos</h3>

        <p>
            Intenta cambiar los filtros o utilizar otro término de búsqueda.
        </p>
    </div>

</div>

@endsection

@push('styles')

<style>
/* =========================
   RECURSOS DE APRENDIZAJE
========================= */

.resources-page {
    padding-bottom: 35px;
}

/* Encabezado */

.resources-header {
    background: linear-gradient(135deg, #143D60, #27667B);
    border-radius: 20px;
    padding: 35px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    overflow: hidden;
    position: relative;
}

.resources-header::before {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: rgba(255,255,255,0.06);
    top: -130px;
    right: 100px;
}

.resources-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.5px;
    color: #DDEB9D;
    margin-bottom: 12px;
}

.resources-header h1 {
    font-size: 30px;
    font-weight: 800;
    margin: 0 0 12px;
}

.resources-header p {
    margin: 0;
    color: rgba(255,255,255,0.85);
    max-width: 600px;
    line-height: 1.7;
}

.resources-header-icon {
    width: 100px;
    height: 100px;
    border-radius: 25px;
    background: rgba(255,255,255,0.12);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 45px;
    flex-shrink: 0;
    position: relative;
}

/* Resumen */

.resources-summary {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 28px;
}

.summary-card {
    background: #fff;
    border: 1px solid #e8edf1;
    border-radius: 16px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 4px 12px rgba(20,61,96,0.04);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}

.icon-blue {
    background: #E8F2F8;
    color: #27667B;
}

.icon-green {
    background: #EAF5E3;
    color: #5D8B42;
}

.icon-purple {
    background: #F0EAFE;
    color: #8061B2;
}

.icon-orange {
    background: #FFF0E2;
    color: #C77B35;
}

.summary-label {
    color: #7B8794;
    font-size: 12px;
    font-weight: 600;
}

.summary-card h3 {
    color: #143D60;
    font-size: 25px;
    font-weight: 800;
    margin: 4px 0;
}

.summary-card small {
    color: #94A0AC;
    font-size: 11px;
}

/* Buscador */

.resources-toolbar {
    display: grid;
    grid-template-columns: 1fr 200px 250px;
    gap: 15px;
    margin-bottom: 20px;
}

.resource-search {
    position: relative;
}

.resource-search i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #8A99A8;
}

.resource-search input {
    width: 100%;
    height: 48px;
    padding: 0 15px 0 45px;
    border: 1px solid #E2E8EE;
    border-radius: 12px;
    outline: none;
    background: white;
    font-size: 14px;
}

.resource-search input:focus,
.resources-toolbar select:focus {
    border-color: #27667B;
    box-shadow: 0 0 0 3px rgba(39,102,123,0.08);
}

.resources-toolbar select {
    height: 48px;
    border: 1px solid #E2E8EE;
    border-radius: 12px;
    padding: 0 13px;
    background: white;
    color: #455565;
    outline: none;
    font-size: 13px;
}

/* Categorías */

.resources-categories {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.category-button {
    background: white;
    border: 1px solid #E2E8EE;
    border-radius: 10px;
    padding: 10px 16px;
    color: #607080;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all .2s ease;
}

.category-button:hover {
    border-color: #27667B;
    color: #27667B;
}

.category-button.active {
    background: #143D60;
    border-color: #143D60;
    color: white;
}

/* Sección */

.resources-section-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.resources-section-heading h2 {
    font-size: 20px;
    font-weight: 800;
    color: #143D60;
    margin: 0 0 5px;
}

.resources-section-heading p {
    color: #8996A3;
    font-size: 13px;
    margin: 0;
}

.resource-count {
    background: #EAF2F6;
    color: #27667B;
    border-radius: 20px;
    padding: 7px 13px;
    font-size: 12px;
    font-weight: 700;
}

/* Grid */

.resources-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.resource-card {
    background: white;
    border: 1px solid #E8EDF1;
    border-radius: 17px;
    padding: 22px;
    transition: transform .2s ease, box-shadow .2s ease;
    display: flex;
    flex-direction: column;
    min-height: 290px;
}

.resource-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(20,61,96,0.08);
}

.resource-card-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.resource-file-icon {
    width: 48px;
    height: 48px;
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
}

.pdf-icon {
    background: #FDEAEA;
    color: #D9534F;
}

.document-icon {
    background: #EAF2FF;
    color: #4B78B8;
}

.video-icon {
    background: #F1EAFE;
    color: #8061B2;
}

.link-icon {
    background: #E5F4F2;
    color: #29978C;
}

.exercise-icon {
    background: #FFF2DF;
    color: #C98736;
}

.resource-badge {
    font-size: 11px;
    font-weight: 700;
    border-radius: 20px;
    padding: 6px 10px;
}

.badge-pdf {
    background: #FDEAEA;
    color: #C74747;
}

.badge-document {
    background: #EAF2FF;
    color: #4B78B8;
}

.badge-video {
    background: #F1EAFE;
    color: #8061B2;
}

.badge-link {
    background: #E5F4F2;
    color: #29978C;
}

.badge-exercise {
    background: #FFF2DF;
    color: #C98736;
}

.resource-card h3 {
    color: #143D60;
    font-size: 16px;
    font-weight: 800;
    line-height: 1.5;
    margin: 0 0 10px;
}

.resource-card > p {
    color: #7C8996;
    font-size: 13px;
    line-height: 1.7;
    margin: 0 0 18px;
}

.resource-course {
    color: #5F788B;
    background: #F5F8FA;
    border-radius: 8px;
    padding: 9px 10px;
    font-size: 11px;
    display: flex;
    align-items: center;
    gap: 7px;
    margin-top: auto;
    margin-bottom: 18px;
}

.resource-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid #EEF1F4;
    padding-top: 15px;
}

.resource-card-footer > span {
    color: #97A2AD;
    font-size: 11px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.resource-action {
    border: none;
    background: #EAF2F6;
    color: #27667B;
    padding: 9px 12px;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    transition: all .2s ease;
}

.resource-action:hover {
    background: #27667B;
    color: white;
}

/* Estado vacío */

.resources-empty {
    text-align: center;
    padding: 60px 20px;
    background: white;
    border: 1px dashed #D8E2E9;
    border-radius: 16px;
}

.empty-icon {
    width: 65px;
    height: 65px;
    background: #EAF2F6;
    color: #27667B;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 27px;
    margin: 0 auto 18px;
}

.resources-empty h3 {
    color: #143D60;
    font-weight: 800;
}

.resources-empty p {
    color: #8492A0;
    font-size: 14px;
}

/* Responsive */

@media (max-width: 1200px) {
    .resources-summary {
        grid-template-columns: repeat(2, 1fr);
    }

    .resources-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .resources-toolbar {
        grid-template-columns: 1fr 1fr;
    }

    .resource-search {
        grid-column: 1 / -1;
    }
}

@media (max-width: 768px) {
    .resources-header {
        padding: 25px;
    }

    .resources-header h1 {
        font-size: 24px;
    }

    .resources-header-icon {
        width: 70px;
        height: 70px;
        font-size: 30px;
    }

    .resources-summary {
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .summary-card {
        padding: 15px;
        gap: 10px;
    }

    .summary-icon {
        width: 40px;
        height: 40px;
        font-size: 18px;
    }

    .resources-toolbar {
        grid-template-columns: 1fr;
    }

    .resource-search {
        grid-column: auto;
    }

    .resources-grid {
        grid-template-columns: 1fr;
    }

    .resources-section-heading {
        align-items: flex-start;
        gap: 10px;
    }
}

@media (max-width: 480px) {
    .resources-header-icon {
        display: none;
    }

    .resources-summary {
        grid-template-columns: 1fr;
    }

    .category-button {
        padding: 9px 12px;
        font-size: 12px;
    }
}
</style>

@endpush

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('resourceSearch');
    const typeFilter = document.getElementById('resourceTypeFilter');
    const courseFilter = document.getElementById('resourceCourseFilter');
    const categoryButtons = document.querySelectorAll('.category-button');
    const resourceCards = document.querySelectorAll('.resource-card');
    const resourceCount = document.getElementById('resourceCount');
    const emptyState = document.getElementById('resourcesEmpty');

    let selectedCategory = 'all';

    function filterResources() {

        const searchValue = searchInput.value.toLowerCase().trim();
        const selectedType = typeFilter.value;
        const selectedCourse = courseFilter.value;

        let visibleCount = 0;

        resourceCards.forEach(card => {

            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('p').textContent.toLowerCase();
            const searchData = card.dataset.search.toLowerCase();
            const cardType = card.dataset.type;
            const cardCategory = card.dataset.category;
            const cardCourse = card.dataset.course;

            const matchesSearch =
                title.includes(searchValue) ||
                description.includes(searchValue) ||
                searchData.includes(searchValue);

            const matchesType =
                selectedType === '' || cardType === selectedType;

            const matchesCourse =
                selectedCourse === '' || cardCourse === selectedCourse;

            const matchesCategory =
                selectedCategory === 'all' ||
                cardCategory === selectedCategory;

            const visible =
                matchesSearch &&
                matchesType &&
                matchesCourse &&
                matchesCategory;

            card.style.display = visible ? 'flex' : 'none';

            if (visible) {
                visibleCount++;
            }
        });

        resourceCount.textContent =
            visibleCount + (visibleCount === 1 ? ' recurso' : ' recursos');

        emptyState.style.display =
            visibleCount === 0 ? 'block' : 'none';
    }

    searchInput.addEventListener('input', filterResources);
    typeFilter.addEventListener('change', filterResources);
    courseFilter.addEventListener('change', filterResources);

    categoryButtons.forEach(button => {

        button.addEventListener('click', function () {

            categoryButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            this.classList.add('active');

            selectedCategory = this.dataset.category;

            filterResources();
        });

    });

    // Botones demostrativos
    document.querySelectorAll('.resource-action').forEach(button => {

        button.addEventListener('click', function () {

            alert(
                'Este recurso es una demostración de la interfaz. ' +
                'La descarga o apertura del recurso se conectará ' +
                'cuando esté disponible el backend.'
            );

        });

    });

    filterResources();

});
</script>

@endpush