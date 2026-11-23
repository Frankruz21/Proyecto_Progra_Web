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
    .tabla-moderna thead th {
        font-size: .7rem; letter-spacing: .06em; text-transform: uppercase;
        color: #94a3b8; font-weight: 600; border: 0; padding: .9rem 1rem; background: #f8fafc;
    }
    .tabla-moderna tbody td { padding: 1rem; border-color: #f1f5f9; }
    .tabla-moderna tbody tr:not(.fila-contenido):hover { background: #f8fafc; }
    .avatar-icono {
        width: 42px; height: 42px; border-radius: 12px; flex-shrink: 0;
        background: rgba(13,110,253,.1); color: #0d6efd; font-size: 1.1rem;
        display: flex; align-items: center; justify-content: center;
    }
    .btn-icon {
        width: 34px; height: 34px; padding: 0; border: 0; border-radius: 50%;
        background: transparent; transition: background .2s;
        display: inline-flex; align-items: center; justify-content: center;
    }
    .btn-icon:hover { background: #eef2f7; }
</style>
@endonce

<div class="table-responsive border rounded-3">
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
                <tr>
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
                                    <div class="avatar-icono"><i class="bi {{ $col['icono'] ?? 'bi-collection-play' }}"></i></div>
                                    <div>
                                        <div class="fw-semibold text-dark">{{ $valor }}</div>
                                        @isset($col['sub'])
                                            <div class="text-muted small">{{ $col['sub']($fila) }}</div>
                                        @endisset
                                    </div>
                                </div>
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
                                    <i class="bi bi-eye"></i>
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
                                        <i class="bi bi-trash"></i>
                                    </button>
                                @else
                                    <form action="{{ route($ruta.'.destroy', $fila) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon text-danger" title="Eliminar">
                                            <i class="bi bi-trash"></i>
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