<div class="card border-0 shadow-sm mt-2" style="background-color: #f8fafc;">
    <div class="card-body p-3">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-bold text-dark mb-0">
                <i class="bi bi-journal-text text-primary me-2"></i>Lecciones del Módulo
            </h6>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.lecciones.index', ['modulo_id' => $modulo->id]) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                    <i class="bi bi-list-ul me-1"></i> Gestionar Lecciones
                </a>
                <button type="button" class="btn btn-sm btn-success rounded-pill px-3 btn-abrir-leccion"
                        data-modulo-id="{{ $modulo->id }}"
                        data-modulo-titulo="{{ ($modulo->curso->titulo ?? 'Curso') . ' - ' . $modulo->titulo }}">
                    <i class="bi bi-plus-circle me-1"></i> Nueva Lección
                </button>
            </div>
        </div>

        <div class="table-responsive bg-white rounded border">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-uppercase fs-7 text-muted">
                    <tr>
                        <th class="fw-semibold border-0 ps-3" style="width: 40px;"></th>
                        <th class="fw-semibold border-0">Título</th>
                        <th class="fw-semibold border-0">Tipo</th>
                        <th class="fw-semibold border-0 text-end pe-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lecciones as $leccion)
                        <!-- FILA PRINCIPAL -->
                        <tr>
                            <td class="ps-3">
                                <!-- Botón para desplegar recursos -->
                                <button type="button" class="btn btn-sm btn-light toggle-recursos" data-leccion-id="{{ $leccion->id }}">
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                            </td>
                            <td class="fw-medium text-dark">{{ $leccion->titulo }}</td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-2 py-1">
                                    {{ ucfirst($leccion->tipo) }}
                                </span>
                            </td>
                            <td class="text-end pe-3">
                                <div class="btn-group shadow-sm">
                                    <!-- BOTÓN PARA AÑADIR RECURSO -->
                                    <button type="button" class="btn btn-sm btn-outline-success btn-abrir-recurso"
                                            data-leccion-id="{{ $leccion->id }}"
                                            data-leccion-titulo="{{ $leccion->titulo }}"
                                            title="Añadir Recurso">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>
                                    <!-- Botón Editar -->
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-editar-leccion"
                                            data-bs-toggle="modal" data-bs-target="#modalCrearLeccion"
                                            data-leccion="{{ json_encode($leccion) }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <!-- Botón Eliminar -->
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-eliminar-leccion"
                                            data-id="{{ $leccion->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- FILA OCULTA: SUBLISTA DE RECURSOS -->
                        <tr class="d-none fila-recursos" id="recursos-leccion-{{ $leccion->id }}">
                            <td></td>
                            <td colspan="3">
                                <div class="p-3 bg-light rounded border">
                                    <table class="table table-sm bg-white mb-0">
                                        <thead>
                                            <tr>
                                                <th>Archivo</th>
                                                <th>Tipo</th>
                                                <th>Peso</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-recursos">
                                            <!-- Se llena vía JS -->
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                No hay lecciones registradas en este módulo.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- @once: los modales se renderizan una sola vez por página, aunque este parcial se incluya por cada módulo --}}
@once
    <x-modales.create-leccion-modal :moduloId="$modulo->id" />
    <x-modales.create-recurso-modal />
@endonce