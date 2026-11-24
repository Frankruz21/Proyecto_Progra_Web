@props([
    'columnas' => [],
    'filas',
    'ruta' => null,                        // ej: 'admin.modulos'
    'botones' => ['editar', 'eliminar'],   // opciones: ver, editar, eliminar
    'modalEditar' => null,                 // id del modal para editar (si no, usa enlace)
    'eliminarAjax' => false,
    'vacio' => 'No hay registros todavía.',
])

@php
    $conAcciones = $ruta && count($botones);
    $total = count($columnas) + ($conAcciones ? 1 : 0);
@endphp

@once
<style>
    /* ===== Tabla tipo tarjeta (filas separadas, como la imagen) ===== */
    .tabla-moderna {
        border-collapse: separate;
        border-spacing: 0 .55rem;
    }
    .tabla-moderna thead th {
        font-size: .68rem; letter-spacing: .1em; text-transform: uppercase;
        color: #94a3b8; font-weight: 700; border: 0;
        padding: .5rem 1.25rem; background: transparent;
    }
    .tabla-moderna tbody tr.fila-dato {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, .05);
        transition: transform .25s ease, box-shadow .25s ease;
        animation: fadeUp .4s ease both;
    }
    .tabla-moderna tbody tr.fila-dato:nth-child(2) { animation-delay: .03s }
    .tabla-moderna tbody tr.fila-dato:nth-child(3) { animation-delay: .06s }
    .tabla-moderna tbody tr.fila-dato:nth-child(4) { animation-delay: .09s }
    .tabla-moderna tbody tr.fila-dato:nth-child(5) { animation-delay: .12s }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(8px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .tabla-moderna tbody tr.fila-dato:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 26px rgba(76, 52, 212, .13);
    }
    .tabla-moderna tbody td {
        border: 0; padding: 1rem 1.25rem; background: transparent;
    }
    .tabla-moderna tbody tr.fila-dato td:first-child { border-radius: 16px 0 0 16px; }
    .tabla-moderna tbody tr.fila-dato td:last-child  { border-radius: 0 16px 16px 0; }

    /* ===== Avatar con gradiente y efecto ===== */
    .avatar-icono {
        width: 46px; height: 46px; border-radius: 14px; flex-shrink: 0;
        background: linear-gradient(135deg, #6c5ce7, #4834d4);
        color: #fff; font-size: 1.15rem;
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 6px 14px rgba(108, 92, 231, .35);
        transition: transform .35s cubic-bezier(.34, 1.56, .64, 1), box-shadow .35s ease;
    }
    .tabla-moderna tbody tr.fila-dato:hover .avatar-icono {
        transform: scale(1.1) rotate(-6deg);
        box-shadow: 0 8px 20px rgba(108, 92, 231, .5);
    }

    /* ===== Botones de acción con efecto lift + glow ===== */
    .btn-icon {
        width: 38px; height: 38px; padding: 0; border: 0; border-radius: 12px;
        background: #f1f5f9;
        display: inline-flex; align-items: center; justify-content: center;
        transition: all .25s cubic-bezier(.34, 1.56, .64, 1);
    }
    .btn-icon i { transition: transform .25s ease; }
    .btn-icon:hover { transform: translateY(-3px) scale(1.06); color: #fff !important; }
    .btn-icon:hover i { transform: scale(1.15); }
    .btn-icon.text-primary:hover { background: linear-gradient(135deg, #3b82f6, #2563eb); box-shadow: 0 8px 18px rgba(37, 99, 235, .45); }
    .btn-icon.text-info:hover    { background: linear-gradient(135deg, #22d3ee, #0891b2); box-shadow: 0 8px 18px rgba(8, 145, 178, .45); }
    .btn-icon.text-danger:hover  { background: linear-gradient(135deg, #f87171, #dc2626); box-shadow: 0 8px 18px rgba(220, 38, 38, .45); }

    /* ===== Toggle moderno (tipo imagen) ===== */
    .switch-modern { position: relative; display: inline-block; width: 52px; height: 28px; }
    .switch-modern input { opacity: 0; width: 0; height: 0; }
    .slider-switch {
        position: absolute; inset: 0; cursor: pointer; border-radius: 999px;
        background: #e2e8f0;
        box-shadow: inset 0 2px 5px rgba(15, 23, 42, .12);
        transition: .35s cubic-bezier(.34, 1.56, .64, 1);
    }
    .slider-switch::before {
        content: ''; position: absolute;
        width: 22px; height: 22px; left: 3px; top: 3px;
        background: #fff; border-radius: 50%;
        box-shadow: 0 2px 6px rgba(15, 23, 42, .3);
        transition: .35s cubic-bezier(.34, 1.56, .64, 1);
    }
    .switch-modern input:checked + .slider-switch {
        background: linear-gradient(135deg, #6c5ce7, #4834d4);
        box-shadow: 0 4px 14px rgba(108, 92, 231, .5);
    }
    .switch-modern input:checked + .slider-switch::before { transform: translateX(24px); }

    /* ===== Badges / números más suaves ===== */
    .badge.rounded-pill { font-weight: 600; letter-spacing: .02em; }
</style>
@endonce

<div class="table-responsive px-1">
    <table class="table tabla-moderna align-middle mb-0">
        <thead>
            <tr>
                @foreach($columnas as $col)
                    <th class="text-{{ $col['align'] ?? 'start' }}">{{ $col['label'] }}</th>
                @endforeach
                @if($conAcciones) <th class="text-end">Acciones</th> @endif
            </tr>
        </thead>
        <tbody>
            @forelse($filas as $fila)
                <tr class="fila-dato">
                    @foreach($columnas as $col)
                        @php
                            $tipo  = $col['tipo'] ?? 'texto';
                            $valor = isset($col['render'])
                                ? $col['render']($fila)
                                : data_get($fila, $col['campo'] ?? '', '-');
                            if (isset($col['limite'])) $valor = Str::limit($valor, $col['limite']);
                        @endphp
                        <td class="text-{{ $col['align'] ?? 'start' }}">
                            @if($tipo === 'avatar')
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-icono"><i class="bi {{ $col['icono'] ?? 'bi-grid-1x2-fill' }}"></i></div>
                                    <div>
                                        <div class="fw-semibold text-dark">{{ $valor }}</div>
                                        @isset($col['sub'])
                                            <div class="text-muted small">{{ $col['sub']($fila) }}</div>
                                        @endisset
                                    </div>
                                </div>
                            @elseif($tipo === 'switch')
                                @php $bool = (bool) data_get($fila, $col['campo']); @endphp
                                <label class="switch-modern" title="{{ $bool ? 'Activo' : 'Inactivo' }}">
                                    <input type="checkbox" class="input-switch" {{ $bool ? 'checked' : '' }}
                                           data-url="{{ isset($col['url']) ? $col['url']($fila) : '#' }}"
                                           data-estado="{{ $bool ? 1 : 0 }}">
                                    <span class="slider-switch"></span>
                                </label>
                            @elseif($tipo === 'badge')
                                <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary fw-medium px-3 py-2">{{ $valor }}</span>
                            @elseif($tipo === 'numero')
                                <span class="badge rounded-pill bg-light text-dark border px-3 py-2">{{ $valor }}</span>
                            @elseif($tipo === 'booleano')
                                @php $bool = (bool) data_get($fila, $col['campo']); @endphp
                                <span class="badge rounded-pill px-3 py-2 {{ $bool ? 'bg-success bg-opacity-10 text-success' : 'bg-danger bg-opacity-10 text-danger' }}">
                                    {{ $bool ? 'Sí' : 'No' }}
                                </span>
                            @else
                                <span class="{{ $col['class'] ?? '' }}">{{ ($col['prefijo'] ?? '') . $valor }}</span>
                            @endif
                        </td>
                    @endforeach

                    @if($conAcciones)
                        <td class="text-end">
                            @if(in_array('ver', $botones))
                                <button type="button" class="btn-icon text-info btn-expandir" title="Ver"
                                        data-id="{{ $fila->id }}"
                                        data-url="{{ route($ruta.'.contenido', $fila, false) }}">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            @endif

                            @if(in_array('editar', $botones))
                                @if($modalEditar)
                                    <button type="button" class="btn-icon text-primary btn-editar-modal" title="Editar"
                                            data-bs-toggle="modal" data-bs-target="#{{ $modalEditar }}"
                                            data-registro="{{ json_encode($fila) }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                @else
                                    <a href="{{ route($ruta.'.edit', $fila) }}" class="btn-icon text-primary" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                @endif
                            @endif

                            @if(in_array('eliminar', $botones))
                                @if($eliminarAjax)
                                    <button type="button" class="btn-icon text-danger btn-eliminar-ajax" title="Eliminar"
                                            data-url="{{ route($ruta.'.destroy', $fila, false) }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                @else
                                    <form action="{{ route($ruta.'.destroy', $fila) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon text-danger" title="Eliminar">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    @endif
                </tr>

                @if(in_array('ver', $botones))
                    <tr class="d-none fila-contenido" id="fila-contenido-{{ $fila->id }}">
                        <td colspan="{{ $total }}" class="p-0">
                            <div class="p-3 bg-light border-bottom">
                                <div id="contenido-{{ $fila->id }}"></div>
                            </div>
                        </td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="{{ $total }}" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>{{ $vacio }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@once
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Expandir fila (cargar contenido por AJAX)
        document.querySelectorAll('.btn-expandir').forEach(boton => {
            boton.addEventListener('click', function () {
                const fila = document.getElementById(`fila-contenido-${this.dataset.id}`);
                const cont = document.getElementById(`contenido-${this.dataset.id}`);

                if (!fila.classList.contains('d-none')) { fila.classList.add('d-none'); return; }

                fila.classList.remove('d-none');
                cont.innerHTML = '<div class="text-center py-3"><div class="spinner-border spinner-border-sm text-primary"></div> Cargando...</div>';

                fetch(this.dataset.url)
                    .then(r => r.text())
                    .then(html => cont.innerHTML = html)
                    .catch(() => cont.innerHTML = '<div class="alert alert-danger">Error al cargar.</div>');
            });
        });

        // Toggle activo/inactivo por AJAX
        document.querySelectorAll('.input-switch').forEach(toggle => {
            toggle.addEventListener('change', function () {
                const estadoOriginal = this.dataset.estado == 1;
                fetch(this.dataset.url, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ activo: this.checked })
                }).then(r => {
                    if (!r.ok) {
                        this.checked = estadoOriginal; // revertir si falla
                        alert('Error al actualizar el estado.');
                    } else {
                        this.dataset.estado = this.checked ? 1 : 0;
                    }
                }).catch(() => {
                    this.checked = estadoOriginal;
                    alert('Error de conexión.');
                });
            });
        });

        // Eliminar por AJAX
        document.querySelectorAll('.btn-eliminar-ajax').forEach(boton => {
            boton.addEventListener('click', function () {
                if (!confirm('¿Estás seguro de eliminar este registro?')) return;
                fetch(this.dataset.url, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
                }).then(r => r.ok ? this.closest('tr').remove() : alert('Error al eliminar'));
            });
        });
    });
</script>
@endpush
@endonce