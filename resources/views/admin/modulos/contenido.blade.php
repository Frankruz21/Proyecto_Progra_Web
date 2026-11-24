<div class="card border-0 shadow-sm mt-2" style="background-color: #f8fafc;">
    <div class="card-body p-3">
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-bold text-dark mb-0">
                <i class="bi bi-journal-text text-primary me-2"></i>Lecciones del Módulo
            </h6>
            
            <a href="{{ route('admin.lecciones.index', ['modulo_id' => $modulo->id]) }}" class="btn btn-sm btn-success rounded-pill px-3 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Gestionar Leccines
            </a>
        </div>
        
        <div class="table-responsive bg-white rounded border">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-uppercase fs-7 text-muted">
                    <tr>
                        <th class="fw-semibold border-0 ps-3">Título</th>
                        <th class="fw-semibold border-0">Tipo</th>
                        <th class="fw-semibold border-0 text-center">Orden</th>
                        <th class="fw-semibold border-0 text-center">Preview</th>
                        <th class="fw-semibold border-0 text-end pe-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lecciones as $leccion)
                        <tr>
                            <td class="ps-3 fw-medium text-dark">{{ $leccion->titulo }}</td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-2 py-1">
                                    {{ ucfirst($leccion->tipo) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border px-2 py-1">{{ $leccion->orden }}</span>
                            </td>
                            <td class="text-center">
                                @if($leccion->es_preview)
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1">Sí</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2 py-1">No</span>
                                @endif
                            </td>
                            <td class="text-end pe-3">
                                <div class="btn-group shadow-sm" role="group">
                                    <!-- Botón Editar (Redirige a la vista de edición de lecciones) -->
                                    <a href="{{ route('admin.lecciones.edit', $leccion) }}" class="btn btn-sm btn-outline-primary" title="Editar Lección">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('admin.lecciones.destroy', $leccion) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta lección?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar Lección">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                No hay lecciones registradas en este módulo.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>