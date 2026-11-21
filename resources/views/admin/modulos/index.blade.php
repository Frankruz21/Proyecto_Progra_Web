@extends('layouts.admin')

@section('title', 'Gestión de Módulos')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h3 class="card-title fw-bold text-dark mb-0">
            <i class="bi bi-collection-play text-primary me-2"></i>Lista de Módulos
        </h3>
        <button type="button" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCrearModulo">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Módulo
        </button>
    </div>
    
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-uppercase fs-7 text-muted">
                    <tr>
                        <th class="fw-semibold border-0">ID</th>
                        <th class="fw-semibold border-0">Curso</th>
                        <th class="fw-semibold border-0">Título del Módulo</th>
                        <th class="fw-semibold border-0">Descripción</th>
                        <th class="fw-semibold border-0 text-center">Orden</th>
                        <th class="fw-semibold border-0 text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($modulos as $modulo)
                        <tr>
                            <td class="text-muted fw-bold">#{{ $modulo->id }}</td>
                            
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-1">
                                    <i class="bi bi-book me-1"></i> {{ $modulo->curso->titulo ?? 'Sin curso' }}
                                </span>
                            </td>
                            
                            <td class="fw-medium">{{ $modulo->titulo }}</td>
                            
                            <td class="text-muted small">
                                {{ Str::limit($modulo->descripcion ?? 'Sin descripción', 50) }}
                            </td>
                            
                            <td class="text-center">
                                <span class="badge bg-light text-dark border px-3 py-1">{{ $modulo->orden }}</span>
                            </td>
                            
                            <td class="text-end">
                                <div class="btn-group shadow-sm" role="group">
                                    <!-- BOTÓN PARA CARGAR CONTENIDO VÍA AJAX -->
                                    <button class="btn btn-sm btn-outline-info btn-ver-modulo" data-id="{{ $modulo->id }}" title="Ver Lecciones">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <a href="{{ route('admin.modulos.edit', $modulo) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.modulos.destroy', $modulo) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este módulo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                No hay módulos registrados todavía.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- CONTENEDOR DONDE SE INYECTARÁ EL CONTENIDO DEL MÓDULO -->
<div id="contenedor-modulo" class="mt-4"></div>

<!-- MODAL PARA CREAR MÓDULO -->
<div class="modal fade" id="modalCrearModulo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            
            <form action="{{ route('admin.modulos.store') }}" method="POST">
                @csrf
                
                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle text-success me-2"></i>Crear Nuevo Módulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Curso al que pertenece</label>
                            <select name="curso_id" class="form-select @error('curso_id') is-invalid @enderror" required>
                                <option value="">Seleccione un curso...</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
                                        {{ $curso->titulo }}
                                    </option>
                                @endforeach
                            </select>
                            @error('curso_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Título del Módulo</label>
                            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" required>
                            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Descripción (Opcional)</label>
                            <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Orden</label>
                            <input type="number" name="orden" class="form-control @error('orden') is-invalid @enderror" value="{{ old('orden', 1) }}" required min="1">
                            @error('orden') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer border-top-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success px-4"><i class="bi bi-save me-1"></i> Guardar Módulo</button>
                </div>
            </form>

        </div>
    </div>
</div>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('modalCrearModulo'));
            myModal.show();
        });
    </script>
@endif

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const botonesVer = document.querySelectorAll('.btn-ver-modulo');
        const contenedor = document.getElementById('contenedor-modulo');

        botonesVer.forEach(boton => {
            boton.addEventListener('click', function() {
                const moduloId = this.dataset.id;
                
                contenedor.innerHTML = '<div class="text-center py-4"><div class="spinner-border text-primary" role="status"></div><p class="mt-2">Cargando contenido del módulo...</p></div>';

                fetch(`/admin/modulos/${moduloId}/contenido`)
                    .then(response => response.text())
                    .then(html => {
                        contenedor.innerHTML = html;
                        contenedor.scrollIntoView({ behavior: 'smooth' });
                    })
                    .catch(error => {
                        contenedor.innerHTML = '<div class="alert alert-danger">Error al cargar el contenido. Revisa la consola.</div>';
                        console.error('Error:', error);
                    });
            });
        });
    });
</script>
@endpush

@endsection