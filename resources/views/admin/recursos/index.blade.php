@extends('layouts.admin')

@section('title', 'Gestión de Recursos')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h3 class="card-title fw-bold text-dark mb-0">
            <i class="bi bi-paperclip text-primary me-2"></i>Recursos Adjuntos
        </h3>
        <button type="button" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCrearRecurso">
            <i class="bi bi-cloud-arrow-up me-1"></i> Subir Recurso
        </button>
    </div>
    
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-uppercase fs-7 text-muted">
                    <tr>
                        <th class="fw-semibold border-0">Recurso</th>
                        <th class="fw-semibold border-0">Asociado a</th>
                        <th class="fw-semibold border-0">Tipo</th>
                        <th class="fw-semibold border-0">Peso</th>
                        <th class="fw-semibold border-0">Fecha</th>
                        <th class="fw-semibold border-0 text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse($recursos as $recurso)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3 text-secondary">
                                        <i class="bi bi-file-earmark-arrow-down fs-4"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark text-truncate" style="max-width: 200px;" title="{{ $recurso->nombre_original }}">
                                            {{ $recurso->titulo }}
                                        </div>
                                        <div class="text-muted small">{{ $recurso->nombre_original }}</div>
                                    </div>
                                </div>
                            </td>
                            
                            <td>
                                @if($recurso->leccion)
                                    <span class="badge bg-info bg-opacity-10 text-info rounded-pill px-3 py-1 mb-1">
                                        Lección: {{ Str::limit($recurso->leccion->titulo, 15) }}
                                    </span><br>
                                @endif
                                @if($recurso->curso)
                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1">
                                        Curso: {{ Str::limit($recurso->curso->titulo, 15) }}
                                    </span>
                                @endif
                            </td>
                            
                            <td><span class="text-muted small">{{ strtoupper($recurso->tipo) }}</span></td>
                            <td><span class="text-muted small">{{ number_format($recurso->tamano_bytes / 1024, 2) }} KB</span></td>
                            <td><span class="text-muted small">{{ $recurso->created_at->format('d/m/Y') }}</span></td>
                            
                            <td class="text-end">
                                <div class="btn-group shadow-sm" role="group">
                                    <!-- Botón de descarga (usa el storage link) -->
                                    <a href="{{ asset('storage/' . $recurso->ruta) }}" target="_blank" class="btn btn-sm btn-outline-success" title="Ver/Descargar">
                                        <i class="bi bi-download"></i>
                                    </a>
                                    <form action="{{ route('admin.recursos.destroy', $recurso) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este recurso?')">
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
                                <i class="bi bi-folder-x fs-1 d-block mb-3"></i>
                                No hay recursos subidos todavía.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL PARA SUBIR RECURSO -->
<div class="modal fade" id="modalCrearRecurso" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            
            <!-- OJO: enctype="multipart/form-data" es OBLIGATORIO para subir archivos -->
            <form action="{{ route('admin.recursos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title fw-bold"><i class="bi bi-cloud-arrow-up text-success me-2"></i>Subir Nuevo Recurso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <!-- Título -->
                        <div class="col-md-8">
                            <label class="form-label fw-semibold text-muted small">Título del Recurso</label>
                            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" required>
                            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <!-- Tipo -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-muted small">Tipo (Ej: Guía, Código)</label>
                            <input type="text" name="tipo" class="form-control" value="{{ old('tipo', 'guia') }}" required>
                        </div>

                        <!-- Asociar a Curso o Lección -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted small">Asociar a Curso (Opcional)</label>
                            <select name="curso_id" class="form-select">
                                <option value="">Ningún curso...</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>{{ $curso->titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted small">Asociar a Lección (Opcional)</label>
                            <select name="leccion_id" class="form-select">
                                <option value="">Ninguna lección...</option>
                                @foreach($lecciones as $leccion)
                                    <option value="{{ $leccion->id }}" {{ old('leccion_id') == $leccion->id ? 'selected' : '' }}>
                                        {{ $leccion->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Archivo -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Archivo (Máx. 10MB)</label>
                            <input type="file" name="archivo" class="form-control @error('archivo') is-invalid @enderror" required>
                            @error('archivo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div class="form-text small">Formatos permitidos: PDF, Word, Excel, PPT, ZIP, Imágenes, Video, Audio.</div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer border-top-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success px-4"><i class="bi bi-upload me-1"></i> Subir Recurso</button>
                </div>
            </form>

        </div>
    </div>
</div>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('modalCrearRecurso'));
            myModal.show();
        });
    </script>
@endif

@endsection