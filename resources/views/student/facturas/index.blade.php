@extends('layouts.student')

@section('title', 'Mis facturas')

@section('active-facturas', 'active')

@section('content')

<style>
    .invoices-page {
        padding-bottom: 30px;
    }

    .invoices-hero {
        background: linear-gradient(135deg, #143D60, #27667B);
        border-radius: 22px;
        padding: 32px;
        color: white;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
    }

    .invoices-hero::after {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        right: -70px;
        top: -80px;
    }

    .invoices-hero h1 {
        font-weight: 800;
        margin-bottom: 10px;
    }

    .invoices-hero p {
        margin-bottom: 0;
        opacity: .85;
        max-width: 600px;
    }

    .invoice-hero-icon {
        font-size: 70px;
        opacity: .9;
    }

    .invoice-stat-card {
        border: none;
        border-radius: 18px;
        background: white;
        box-shadow: 0 5px 20px rgba(20,61,96,.06);
        padding: 22px;
        height: 100%;
    }

    .invoice-stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 15px;
    }

    .invoice-stat-card h3 {
        font-size: 28px;
        font-weight: 800;
        color: #143D60;
        margin-bottom: 5px;
    }

    .invoice-stat-card p {
        color: #718096;
        margin: 0;
        font-size: 14px;
    }

    .invoice-toolbar {
        background: white;
        border-radius: 18px;
        padding: 20px;
        margin: 28px 0;
        box-shadow: 0 5px 20px rgba(20,61,96,.05);
    }

    .invoice-search {
        position: relative;
    }

    .invoice-search i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    .invoice-search input {
        padding-left: 42px;
        border-radius: 12px;
        min-height: 45px;
    }

    .invoice-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #e8eef3;
        box-shadow: 0 6px 22px rgba(20,61,96,.05);
        transition: transform .25s, box-shadow .25s;
        height: 100%;
    }

    .invoice-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(20,61,96,.12);
    }

    .invoice-card-header {
        padding: 22px;
        background: #f5f9fc;
        border-bottom: 1px solid #e8eef3;
    }

    .invoice-icon {
        width: 52px;
        height: 52px;
        background: #eaf2f8;
        color: #27667B;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .invoice-number {
        font-weight: 800;
        color: #143D60;
        font-size: 15px;
    }

    .invoice-card-body {
        padding: 22px;
    }

    .invoice-concept {
        font-weight: 700;
        font-size: 17px;
        color: #143D60;
        margin-bottom: 18px;
    }

    .invoice-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 13px;
        color: #64748b;
        font-size: 14px;
    }

    .invoice-info i {
        color: #27667B;
        width: 18px;
    }

    .invoice-amount {
        background: #f1f7fa;
        border-radius: 12px;
        padding: 14px;
        margin: 18px 0;
    }

    .invoice-amount small {
        display: block;
        color: #718096;
        margin-bottom: 5px;
    }

    .invoice-amount h3 {
        color: #143D60;
        font-weight: 800;
        margin: 0;
    }

    .invoice-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 20px;
        padding: 7px 12px;
        font-size: 12px;
        font-weight: 700;
    }

    .invoice-status-paid {
        background: #e9f7ed;
        color: #2d7a45;
    }

    .invoice-status-pending {
        background: #fff4df;
        color: #b7791f;
    }

    .invoice-status-cancelled {
        background: #feecec;
        color: #c0392b;
    }

    .invoice-actions {
        display: flex;
        gap: 10px;
        margin-top: 18px;
    }

    .invoice-actions .btn {
        flex: 1;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-invoice-primary {
        background: #143D60;
        color: white;
        border: none;
    }

    .btn-invoice-primary:hover {
        background: #27667B;
        color: white;
    }

    .btn-invoice-outline {
        border: 1px solid #27667B;
        color: #27667B;
    }

    .btn-invoice-outline:hover {
        background: #27667B;
        color: white;
    }

    .invoice-empty-state {
        display: none;
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
    }

    .invoice-empty-state i {
        font-size: 55px;
        color: #a0c878;
    }

    .invoice-empty-state h4 {
        color: #143D60;
        margin-top: 15px;
    }

    @media (max-width: 768px) {
        .invoices-hero {
            padding: 25px;
        }

        .invoice-hero-icon {
            font-size: 45px;
        }

        .invoice-actions {
            flex-direction: column;
        }
    }
</style>

<div class="invoices-page">

    {{-- ENCABEZADO --}}
    <div class="invoices-hero">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1><i class="bi bi-receipt me-2"></i>Mis facturas</h1>
                <p>
                    Consulta tus facturas y el estado de tus pagos.
                    Aquí puedes revisar los detalles de tus compras y pagos realizados.
                </p>
            </div>

            <div class="col-md-4 text-center d-none d-md-block">
                <i class="bi bi-wallet2 invoice-hero-icon"></i>
            </div>
        </div>
    </div>

    {{-- ESTADÍSTICAS --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="invoice-stat-card">
                <div class="invoice-stat-icon" style="background:#eaf2f8;color:#27667B;">
                    <i class="bi bi-receipt"></i>
                </div>
                <h3>3</h3>
                <p>Total de facturas</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="invoice-stat-card">
                <div class="invoice-stat-icon" style="background:#e9f7ed;color:#65a35a;">
                    <i class="bi bi-check-circle"></i>
                </div>
                <h3>2</h3>
                <p>Facturas pagadas</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="invoice-stat-card">
                <div class="invoice-stat-icon" style="background:#fff4df;color:#d69b35;">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h3>1</h3>
                <p>Pago pendiente</p>
            </div>
        </div>

    </div>

    {{-- BUSCADOR Y FILTRO --}}
    <div class="invoice-toolbar">
        <div class="row g-3 align-items-center">

            <div class="col-lg-7">
                <div class="invoice-search">
                    <i class="bi bi-search"></i>
                    <input
                        type="text"
                        id="invoiceSearch"
                        class="form-control"
                        placeholder="Buscar factura o curso..."
                    >
                </div>
            </div>

            <div class="col-lg-5">
                <select class="form-select" id="invoiceFilter">
                    <option value="todos">Todos los estados</option>
                    <option value="pagada">Pagadas</option>
                    <option value="pendiente">Pendientes</option>
                    <option value="cancelada">Canceladas</option>
                </select>
            </div>

        </div>
    </div>

    {{-- FACTURAS --}}
    <div class="row g-4" id="invoicesContainer">

        {{-- FACTURA 1 --}}
        <div class="col-lg-4 col-md-6 invoice-item"
             data-concept="fundamentos de programación"
             data-status="pagada">

            <div class="invoice-card">

                <div class="invoice-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="invoice-icon">
                            <i class="bi bi-receipt"></i>
                        </div>

                        <div>
                            <div class="invoice-number">FAC-2026-001</div>
                            <small class="text-muted">Factura de compra</small>
                        </div>
                    </div>
                </div>

                <div class="invoice-card-body">

                    <div class="invoice-concept">
                        Fundamentos de Programación
                    </div>

                    <div class="invoice-info">
                        <i class="bi bi-calendar"></i>
                        <span>10 de noviembre de 2026</span>
                    </div>

                    <div class="invoice-info">
                        <i class="bi bi-credit-card"></i>
                        <span>Pago con tarjeta</span>
                    </div>

                    <div class="invoice-amount">
                        <small>Total de la factura</small>
                        <h3>L 1,500.00</h3>
                    </div>

                    <span class="invoice-status invoice-status-paid">
                        <i class="bi bi-check-circle-fill"></i>
                        Pagada
                    </span>

                    <div class="invoice-actions">
                        <button class="btn btn-invoice-primary"
                                onclick="showInvoiceDemo('FAC-2026-001')">
                            <i class="bi bi-eye me-1"></i> Ver detalle
                        </button>

                        <button class="btn btn-invoice-outline"
                                onclick="showInvoiceDemo('FAC-2026-001')">
                            <i class="bi bi-download me-1"></i> Descargar
                        </button>
                    </div>

                </div>
            </div>
        </div>

        {{-- FACTURA 2 --}}
        <div class="col-lg-4 col-md-6 invoice-item"
             data-concept="diseño web"
             data-status="pagada">

            <div class="invoice-card">

                <div class="invoice-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="invoice-icon">
                            <i class="bi bi-receipt"></i>
                        </div>

                        <div>
                            <div class="invoice-number">FAC-2026-002</div>
                            <small class="text-muted">Factura de compra</small>
                        </div>
                    </div>
                </div>

                <div class="invoice-card-body">

                    <div class="invoice-concept">
                        Diseño Web
                    </div>

                    <div class="invoice-info">
                        <i class="bi bi-calendar"></i>
                        <span>25 de octubre de 2026</span>
                    </div>

                    <div class="invoice-info">
                        <i class="bi bi-credit-card"></i>
                        <span>Pago con tarjeta</span>
                    </div>

                    <div class="invoice-amount">
                        <small>Total de la factura</small>
                        <h3>L 1,200.00</h3>
                    </div>

                    <span class="invoice-status invoice-status-paid">
                        <i class="bi bi-check-circle-fill"></i>
                        Pagada
                    </span>

                    <div class="invoice-actions">
                        <button class="btn btn-invoice-primary"
                                onclick="showInvoiceDemo('FAC-2026-002')">
                            <i class="bi bi-eye me-1"></i> Ver detalle
                        </button>

                        <button class="btn btn-invoice-outline"
                                onclick="showInvoiceDemo('FAC-2026-002')">
                            <i class="bi bi-download me-1"></i> Descargar
                        </button>
                    </div>

                </div>
            </div>
        </div>

        {{-- FACTURA 3 --}}
        <div class="col-lg-4 col-md-6 invoice-item"
             data-concept="bases de datos"
             data-status="pendiente">

            <div class="invoice-card">

                <div class="invoice-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="invoice-icon">
                            <i class="bi bi-receipt"></i>
                        </div>

                        <div>
                            <div class="invoice-number">FAC-2026-003</div>
                            <small class="text-muted">Factura de compra</small>
                        </div>
                    </div>
                </div>

                <div class="invoice-card-body">

                    <div class="invoice-concept">
                        Bases de Datos
                    </div>

                    <div class="invoice-info">
                        <i class="bi bi-calendar"></i>
                        <span>15 de noviembre de 2026</span>
                    </div>

                    <div class="invoice-info">
                        <i class="bi bi-credit-card"></i>
                        <span>Pago pendiente</span>
                    </div>

                    <div class="invoice-amount">
                        <small>Total de la factura</small>
                        <h3>L 1,800.00</h3>
                    </div>

                    <span class="invoice-status invoice-status-pending">
                        <i class="bi bi-clock-fill"></i>
                        Pendiente
                    </span>

                    <div class="invoice-actions">
                        <button class="btn btn-invoice-primary"
                                onclick="showInvoiceDemo('FAC-2026-003')">
                            <i class="bi bi-eye me-1"></i> Ver detalle
                        </button>

                        <button class="btn btn-invoice-outline"
                                onclick="showInvoiceDemo('FAC-2026-003')">
                            <i class="bi bi-download me-1"></i> Descargar
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- ESTADO VACÍO --}}
    <div class="invoice-empty-state" id="invoiceEmpty">
        <i class="bi bi-search"></i>
        <h4>No encontramos facturas</h4>
        <p class="text-muted">
            Intenta buscar con otro nombre o cambia el filtro.
        </p>
    </div>

</div>

@endsection

@push('scripts')
<script>
    const invoiceSearch = document.getElementById('invoiceSearch');
    const invoiceFilter = document.getElementById('invoiceFilter');
    const invoiceItems = document.querySelectorAll('.invoice-item');
    const invoiceEmpty = document.getElementById('invoiceEmpty');

    function filterInvoices() {
        const searchText = invoiceSearch.value.toLowerCase().trim();
        const filterValue = invoiceFilter.value;

        let visibleCount = 0;

        invoiceItems.forEach(item => {
            const concept = item.dataset.concept.toLowerCase();
            const status = item.dataset.status;

            const matchesSearch = concept.includes(searchText);
            const matchesStatus = filterValue === 'todos' || status === filterValue;

            if (matchesSearch && matchesStatus) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        invoiceEmpty.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    invoiceSearch.addEventListener('input', filterInvoices);
    invoiceFilter.addEventListener('change', filterInvoices);

    function showInvoiceDemo(invoiceNumber) {
        alert(
            'La factura ' + invoiceNumber +
            ' estará disponible para visualizar y descargar cuando conectemos esta vista con el backend.'
        );
    }
</script>
@endpush