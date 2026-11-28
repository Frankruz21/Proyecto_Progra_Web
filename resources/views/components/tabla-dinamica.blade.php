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

    $alignMap = [
        'start'  => 'text-left',
        'center' => 'text-center',
        'end'    => 'text-right',
    ];
@endphp

@once
@push('styles')
<style>
    .tabla-pildora {
        border-collapse: separate !important;
        border-spacing: 0 10px !important;
    }

    .tabla-pildora tbody tr.fila-pildora {
        background: linear-gradient(
            90deg,
            #10233a 0%,
            #162d47 45%,
            #1a3952 75%,
            #1e4852 100%
        ) !important;
        box-shadow: 0 4px 14px rgba(16, 35, 58, 0.24) !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }

    .tabla-pildora tbody tr.fila-pildora:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px -4px rgba(27, 92, 99, 0.45) !important;
    }

    .tabla-pildora tbody tr.fila-pildora > td {
        background-color: transparent !important;
        background: transparent !important;
        color: #f8fafc !important;
        border: 0 !important;
    }

    .tabla-pildora tbody tr.fila-pildora > td:first-child {
        border-top-left-radius: 18px !important;
        border-bottom-left-radius: 18px !important;
    }

    .tabla-pildora tbody tr.fila-pildora > td:last-child {
        border-top-right-radius: 18px !important;
        border-bottom-right-radius: 18px !important;
    }

    .tabla-pildora tbody tr.fila-pildora .text-muted,
    .tabla-pildora tbody tr.fila-pildora .text-slate-400,
    .tabla-pildora tbody tr.fila-pildora .text-slate-300\/80 {
        color: #cbd5e1 !important;
    }

    .tabla-pildora tbody tr.fila-pildora .btn-accion {
        background-color: rgba(255, 255, 255, 0.14) !important;
        color: #ffffff !important;
        border: 1px solid rgba(255, 255, 255, 0.18) !important;
    }
    .tabla-pildora tbody tr.fila-pildora .btn-accion:hover {
        background-color: #14b8b8 !important;
        color: #ffffff !important;
    }
</style>
@endpush
@endonce
<div class="w-full overflow-x-auto p-3 rounded-3xl bg-gradient-to-br from-sky-50 via-white to-emerald-50 border border-slate-200/70 scroll-suave">
    <table class="w-full tabla-pildora border-collapse">
        <thead>
            <tr>
                @foreach($columnas as $col)
                    @php $thAlign = $alignMap[$col['align'] ?? 'start'] ?? 'text-left'; @endphp
                    <th class="{{ $thAlign }} px-4 py-2 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                        {{ $col['label'] }}
                    </th>
                @endforeach

                @if($conAcciones)
                    <th class="text-right px-4 py-2 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                        Acciones
                    </th>
                @endif
            </tr>
        </thead>

        <tbody>
            @forelse($filas as $fila)
                @php
                    $estaInactivo = isset($fila->activo) && !(bool) $fila->activo;
                @endphp

                <tr class="fila-pildora text-white {{ $estaInactivo ? 'fila-inactiva' : '' }}">
                    @foreach($columnas as $col)
                        @php
                            $tipo  = $col['tipo'] ?? 'texto';
                            $tdAlign = $alignMap[$col['align'] ?? 'start'] ?? 'text-left';
                            $valor = isset($col['render'])
                                ? $col['render']($fila)
                                : data_get($fila, $col['campo'] ?? '', '-');

                            if (isset($col['limite'])) {
                                $valor = \Illuminate\Support\Str::limit($valor, $col['limite']);
                            }
                        @endphp

                        <td class="{{ $tdAlign }} px-4 py-3.5 align-middle">
                            @if($tipo === 'avatar')
                                <div class="inline-flex items-center gap-3 text-left">
                                    <div class="w-11 h-11 rounded-2xl shrink-0 bg-gradient-to-br from-indigo-500 via-blue-500 to-emerald-400 text-white flex items-center justify-center text-base shadow-md shadow-indigo-950/40 ring-1 ring-white/20">
                                        <i class="bi {{ $col['icono'] ?? 'bi-grid-1x2-fill' }}"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-sm text-white leading-snug">
                                            {{ $valor }}
                                        </div>
                                        @isset($col['sub'])
                                            <div class="text-xs text-slate-300/80 leading-tight mt-0.5">
                                                {{ $col['sub']($fila) }}
                                            </div>
                                        @endisset
                                    </div>
                                </div>

                            @elseif($tipo === 'switch')
                                @php $bool = (bool) data_get($fila, $col['campo']); @endphp
                                <label class="relative inline-flex items-center cursor-pointer select-none"
                                       title="{{ $bool ? 'Activo' : 'Inactivo' }}">
                                    <input type="checkbox"
                                           class="sr-only peer input-switch"
                                           {{ $bool ? 'checked' : '' }}
                                           data-url="{{ isset($col['url']) ? $col['url']($fila) : '#' }}"
                                           data-estado="{{ $bool ? 1 : 0 }}">
                                    <div class="w-12 h-7 bg-slate-600/70 peer-focus:outline-none rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-emerald-400 peer-checked:to-teal-500 after:content-[''] after:absolute after:top-[3px] after:left-[3px] after:bg-white after:rounded-full after:h-[22px] after:w-[22px] after:shadow after:transition-all peer-checked:after:translate-x-5"></div>
                                </label>

                            @elseif($tipo === 'badge')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-sky-400/15 text-sky-200 border border-sky-300/25">
                                    {{ $valor }}
                                </span>

                            @elseif($tipo === 'numero')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-400/20 text-emerald-200 border border-emerald-300/30">
                                    {{ $valor }}
                                </span>

                            @elseif($tipo === 'booleano')
                                @php $bool = (bool) data_get($fila, $col['campo']); @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $bool ? 'bg-emerald-400/20 text-emerald-200 border border-emerald-300/30' : 'bg-rose-500/20 text-rose-200 border border-rose-400/30' }}">
                                    {{ $bool ? 'Sí' : 'No' }}
                                </span>

                            @else
                                <span class="text-sm text-slate-100 {{ $col['class'] ?? '' }}">
                                    {{ ($col['prefijo'] ?? '') . $valor }}
                                </span>
                            @endif
                        </td>
                    @endforeach

                    @if($conAcciones)
                        <td class="text-right px-4 py-3.5 align-middle whitespace-nowrap">
                            <div class="inline-flex items-center justify-end gap-2">
                                @if(in_array('ver', $botones))
                                    <button type="button"
                                            title="Ver contenido"
                                            class="w-9 h-9 rounded-xl bg-white/10 hover:bg-cyan-500 text-cyan-200 hover:text-white border border-white/10 inline-flex items-center justify-center transition duration-200 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-cyan-500/30 btn-expandir"
                                            data-id="{{ $fila->id }}"
                                            data-url="{{ route($ruta.'.contenido', $fila, false) }}">
                                        <i class="bi bi-eye text-sm"></i>
                                    </button>
                                @endif

                                @if(in_array('editar', $botones))
                                    @if($modalEditar)
                                        <button type="button"
                                                title="Editar"
                                                class="w-9 h-9 rounded-xl bg-white/10 hover:bg-indigo-500 text-indigo-200 hover:text-white border border-white/10 inline-flex items-center justify-center transition duration-200 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-indigo-500/30 btn-editar-modal"
                                                data-bs-toggle="modal"
                                                data-bs-target="#{{ $modalEditar }}"
                                                data-registro="{{ json_encode($fila) }}">
                                            <i class="bi bi-pencil text-sm"></i>
                                        </button>
                                    @else
                                        <a href="{{ route($ruta.'.edit', $fila) }}"
                                           title="Editar"
                                           class="w-9 h-9 rounded-xl bg-white/10 hover:bg-indigo-500 text-indigo-200 hover:text-white border border-white/10 inline-flex items-center justify-center transition duration-200 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-indigo-500/30">
                                            <i class="bi bi-pencil text-sm"></i>
                                        </a>
                                    @endif
                                @endif

                                @if(in_array('eliminar', $botones))
                                    @if($eliminarAjax)
                                        <button type="button"
                                                title="Eliminar"
                                                class="w-9 h-9 rounded-xl bg-white/10 hover:bg-rose-500 text-rose-200 hover:text-white border border-white/10 inline-flex items-center justify-center transition duration-200 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-rose-500/30 btn-eliminar-ajax"
                                                data-url="{{ route($ruta.'.destroy', $fila, false) }}">
                                            <i class="bi bi-trash3 text-sm"></i>
                                        </button>
                                    @else
                                        <form action="{{ route($ruta.'.destroy', $fila) }}"
                                              method="POST"
                                              class="inline-block m-0"
                                              onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    title="Eliminar"
                                                    class="w-9 h-9 rounded-xl bg-white/10 hover:bg-rose-500 text-rose-200 hover:text-white border border-white/10 inline-flex items-center justify-center transition duration-200 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-rose-500/30">
                                                <i class="bi bi-trash3 text-sm"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </td>
                    @endif
                </tr>

                @if(in_array('ver', $botones))
                    <tr class="hidden fila-contenido" id="fila-contenido-{{ $fila->id }}">
                        <td colspan="{{ $total }}" class="px-2 py-1">
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-slate-800 shadow-inner">
                                <div id="contenido-{{ $fila->id }}"></div>
                            </div>
                        </td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="{{ $total }}" class="text-center py-12 text-slate-400">
                        <i class="bi bi-inbox text-4xl block mb-3 opacity-70"></i>
                        <span class="text-sm font-medium">{{ $vacio }}</span>
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

                if (!fila.classList.contains('hidden')) {
                    fila.classList.add('hidden');
                    return;
                }

                fila.classList.remove('hidden');
                cont.innerHTML = `
                    <div class="flex items-center justify-center gap-2 py-3 text-sm text-slate-600">
                        <span class="inline-block w-4 h-4 border-2 border-indigo-500 border-t-transparent rounded-full animate-spin"></span>
                        <span>Cargando contenido...</span>
                    </div>
                `;

                fetch(this.dataset.url)
                    .then(r => r.text())
                    .then(html => cont.innerHTML = html)
                    .catch(() => cont.innerHTML = '<div class="p-3 rounded-xl bg-rose-50 text-rose-600 text-sm font-medium">Error al cargar el contenido.</div>');
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
                        this.checked = estadoOriginal;
                        alert('Error al actualizar el estado.');
                    } else {
                        this.dataset.estado = this.checked ? 1 : 0;
                        const tr = this.closest('tr');
                        if (tr) {
                            tr.classList.toggle('fila-inactiva', !this.checked);
                        }
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
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                }).then(r => {
                    if (r.ok) {
                        const tr = this.closest('tr');
                        const detalle = document.getElementById(`fila-contenido-${tr.querySelector('.btn-expandir')?.dataset.id}`);
                        if (detalle) detalle.remove();
                        tr.remove();
                    } else {
                        alert('Error al eliminar');
                    }
                });
            });
        });
    });
</script>
@endpush
@stack('styles')
@endonce