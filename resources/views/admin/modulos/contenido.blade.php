<div class="card border-0 shadow-sm mt-2" style="background-color: #f8fafc;">
    <div class="card-body p-3">
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-bold text-dark mb-0">
                <i class="bi bi-journal-text text-primary me-2"></i>Lecciones del Módulo
            </h6>

            <!-- NUEVO BOTÓN: Gestionar Lecciones -->
            <a href="{{ route('admin.lecciones.index', ['modulo_id' => $modulo->id]) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 shadow-sm">
                <i class="bi bi-list-ul me-1"></i> Gestionar Lecciones
            </a>
            <!-- Botón para abrir el modal de nueva lección -->
            <button type="button" class="btn btn-sm btn-success rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCrearLeccion">
                <i class="bi bi-plus-circle me-1"></i> Nueva Lección
            </button>
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
                                    <!-- Botón Editar Lección (Abre el modal con los datos) -->
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-primary btn-editar-leccion" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalCrearLeccion"
                                            data-leccion="{{ json_encode($leccion) }}"
                                            title="Editar Lección">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <!-- Botón Eliminar Lección -->
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

<!-- COMPONENTE DEL MODAL DE CREAR LECCIÓN -->
<x-modales.create-leccion-modal :moduloId="$modulo->id" />

@push('scripts')y
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const botonesEditar = document.querySelectorAll('.btn-editar-leccion');
        
        // Elementos del modal
        const modal = document.getElementById('modalCrearLeccion');
        const form = modal.querySelector('form');
        const modalTitle = modal.querySelector('.modal-title');
        const btnSubmit = modal.querySelector('button[type="submit"]');

        botonesEditar.forEach(boton => {
            boton.addEventListener('click', function() {
                const leccion = JSON.parse(this.dataset.leccion);
                
                // 1. Cambiar la acción del formulario para que apunte al update
                form.action = `/admin/lecciones/${leccion.id}`;
                
                // 2. Agregar el método PUT si no existe
                let methodInput = form.querySelector('input[name="_method"]');
                if (!methodInput) {
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    form.appendChild(methodInput);
                }

                // 3. Llenar los campos con los datos de la lección
                form.querySelector('input[name="titulo"]').value = leccion.titulo;
                form.querySelector('select[name="tipo"]').value = leccion.tipo;
                form.querySelector('input[name="orden"]').value = leccion.orden;
                form.querySelector('input[name="url_contenido"]').value = leccion.url_contenido || '';
                form.querySelector('input[name="duracion_min"]').value = leccion.duracion_min || '';
                form.querySelector('textarea[name="contenido"]').value = leccion.contenido || '';
                form.querySelector('input[name="es_preview"]').checked = (leccion.es_preview == 1);

                // 4. Cambiar los textos del modal
                modalTitle.innerHTML = '<i class="bi bi-pencil-square text-primary me-2"></i>Editar Lección';
                btnSubmit.innerHTML = '<i class="bi bi-save me-1"></i> Actualizar Lección';
            });
        });

        // 5. (Opcional) Si cierras el modal de edición, limpiarlo para cuando vuelvas a "Crear"
        modal.addEventListener('hidden.bs.modal', function () {
            form.reset(); // Limpia los campos
            form.action = "{{ route('admin.lecciones.store') }}"; // Vuelve a la ruta de crear
            
            // Quitar el método PUT
            const methodInput = form.querySelector('input[name="_method"]');
            if (methodInput) {
                methodInput.remove();
            }

            // Restaurar textos originales
            modalTitle.innerHTML = '<i class="bi bi-plus-circle text-success me-2"></i>Crear Nueva Lección';
            btnSubmit.innerHTML = '<i class="bi bi-save me-1"></i> Guardar Lección';
        });
    });
</script>
@stack('scripts')
@endpush