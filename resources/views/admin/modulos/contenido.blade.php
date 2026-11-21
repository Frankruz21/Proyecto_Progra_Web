<div class="card shadow-sm border-0 mt-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="bi bi-collection-play me-2"></i> Módulo: {{ $modulo->titulo }}</h5>
    </div>
    <div class="card-body">
        
        <!-- Tabla de Lecciones -->
        <div class="table-responsive">
            <table class="table table-sm table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Orden</th>
                        <th>Preview</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lecciones as $leccion)
                        <tr>
                            <td>{{ $leccion->titulo }}</td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1">
                                    {{ ucfirst($leccion->tipo) }}
                                </span>
                            </td>
                            <td class="text-center">{{ $leccion->orden }}</td>
                            <td>
                                @if($leccion->es_preview)
                                    <span class="badge bg-success bg-opacity-10 text-success">Sí</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger">No</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.lecciones.edit', $leccion) }}" class="btn btn-sm btn-outline-primary" title="Editar Lección">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                No hay lecciones registradas en este módulo.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Botón para ir al panel general de lecciones (opcional) -->
        <div class="mt-3">
            <a href="{{ route('admin.lecciones.index') }}" class="btn btn-success btn-sm rounded-pill px-3">
                <i class="bi bi-plus-circle me-1"></i> Gestionar todas las Lecciones
            </a>
        </div>

    </div>
</div>