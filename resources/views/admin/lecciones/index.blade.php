@extends('layouts.admin')

@section('title', 'Gestión de Lecciones')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h3 class="card-title fw-bold text-dark mb-0">
            <i class="bi bi-journal-text text-primary me-2"></i>Lista de Lecciones
        </h3>
        <button type="button" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCrearLeccion">
            <i class="bi bi-plus-circle me-1"></i> Nueva Lección
        </button>
    </div>
    
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-uppercase fs-7 text-muted">
                    <tr>
                        <th class="fw-semibold border-0">ID</th>
                        <th class="fw-semibold border-0">Módulo / Curso</th>
                        <th class="fw-semibold border-0">Título</th>
                        <th class="fw-semibold border-0">Tipo</th>
                        <th class="fw-semibold border-0 text-center">Orden</th>
                        <th class="fw-semibold border-0 text-center">Preview</th>
                        <th class="fw-semibold border-0 text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($lecciones as $leccion)
                        <tr>
                            <td class="text-muted fw-bold">#{{ $leccion->id }}</td>
                            
                            <td>
                                <div class="fw-semibold text-dark">{{ $leccion->modulo->titulo ?? 'Sin módulo' }}</div>
                                <div class="text-muted small">{{ $leccion->modulo->curso->titulo ?? '' }}</div>
                            </td>
                            
                            <td class="fw-medium">{{ $leccion->titulo }}</td>
                            
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1">
                                    {{ ucfirst($leccion->tipo) }}
                                </span>
                            </td>
                            
                            <td class="text-center">{{ $leccion->orden }}</td>
                            
                            <td class="text-center">
                                @if($leccion->es_preview)
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">
                                        <i class="bi bi-check-circle me-1"></i> Sí
                                    </span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-1">
                                        <i class="bi bi-x-circle me-1"></i> No
                                    </span>
                                @endif
                            </td>
                            
                            <td class="text-end">
                                <div class="btn-group shadow-sm" role="group">
                                    <a href="{{ route('admin.lecciones.edit', $leccion) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.lecciones.destroy', $leccion) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta lección?')">
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
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                No hay lecciones registradas todavía.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL PARA CREAR LECCIÓN (Se mantiene igual) -->
<div class="modal fade" id="modalCrearLeccion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Añadido modal-dialog-centered -->
        <div class="modal-content border-0 shadow">
            
            <form action="{{ route('admin.lecciones.store') }}" method="POST">
                @csrf
                
                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle text-success me-2"></i>Crear Nueva Lección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <!-- Módulo -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Módulo / Curso</label>
                            <select name="modulo_id" class="form-select @error('modulo_id') is-invalid @enderror" required>
                                <option value="">Seleccione un módulo...</option>
                                @foreach($modulos as $modulo)
                                    <option value="{{ $modulo->id }}" {{ old('modulo_id') == $modulo->id ? 'selected' : '' }}>
                                        {{ $modulo->curso->titulo ?? 'Curso' }} - {{ $modulo->titulo }}
                                    </option>
                                @endforeach
                            </select>
                            @error('modulo_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Título -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Título de la Lección</label>
                            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" required>
                            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Tipo y Orden -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted small">Tipo de Lección</label>
                            <select name="tipo" class="form-select @error('tipo') is-invalid @enderror" required>
                                <option value="video" {{ old('tipo') == 'video' ? 'selected' : '' }}>Video</option>
                                <option value="lectura" {{ old('tipo') == 'lectura' ? 'selected' : '' }}>Lectura</option>
                                <option value="examen" {{ old('tipo') == 'examen' ? 'selected' : '' }}>Examen</option>
                                <option value="taller" {{ old('tipo') == 'taller' ? 'selected' : '' }}>Taller</option>
                                <option value="codigo" {{ old('tipo') == 'codigo' ? 'selected' : '' }}>Código</option>
                            </select>
                            @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted small">Orden</label>
                            <input type="number" name="orden" class="form-control @error('orden') is-invalid @enderror" value="{{ old('orden', 1) }}" required min="1">
                            @error('orden') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- URL y Duración -->
                        <div class="col-md-8">
                            <label class="form-label fw-semibold text-muted small">URL del contenido (Video, PDF, etc.)</label>
                            <input type="url" name="url_contenido" class="form-control" value="{{ old('url_contenido') }}" placeholder="https://...">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-muted small">Duración (min)</label>
                            <input type="number" name="duracion_min" class="form-control" value="{{ old('duracion_min') }}" min="0">
                        </div>

                        <!-- Contenido en texto -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Contenido de texto (Opcional)</label>
                            <textarea name="contenido" class="form-control" rows="3">{{ old('contenido') }}</textarea>
                        </div>

                        <!-- Es Preview -->
                        <div class="col-md-12">
                            <div class="form-check form-switch bg-light p-3 rounded border">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="es_preview" id="es_preview" value="1" {{ old('es_preview') ? 'checked' : '' }}>
                                <label class="form-check-label fw-medium" for="es_preview">¿Es una lección de vista previa (Gratis)?</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer border-top-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success px-4"><i class="bi bi-save me-1"></i> Guardar Lección</button>
                </div>
            </form>

        </div>
    </div>
</div>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('modalCrearLeccion'));
            myModal.show();
        });
    </script>
@endif

@endsection