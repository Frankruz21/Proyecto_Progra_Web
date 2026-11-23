@php
    $esEdicion = isset($leccion);
    $action = $esEdicion ? route('admin.lecciones.update', $leccion->id) : route('admin.lecciones.store');
    $tituloModal = $esEdicion ? 'Editar Lección' : 'Crear Nueva Lección';
    $icono = $esEdicion ? 'bi-pencil-square text-primary' : 'bi-plus-circle text-success';

    $moduloActual = ($modulos ?? collect())->firstWhere('id', $moduloId);
    $nombreModulo = $moduloActual
        ? (($moduloActual->curso->titulo ?? 'Curso') . ' - ' . $moduloActual->titulo)
        : 'Módulo #' . $moduloId;
@endphp

<div class="modal fade" id="modalCrearLeccion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <form action="{{ $action }}" method="POST">
                @csrf
                @if($esEdicion)
                    @method('PUT')
                @endif

                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title fw-bold">
                        <i class="bi {{ $icono }} me-2"></i>{{ $tituloModal }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-3">

                        <!-- Módulo actual (fijo) -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Módulo / Curso</label>
                            @if($moduloId)
                                <input type="text" class="form-control bg-light" value="{{ $nombreModulo }}" disabled>
                                <input type="hidden" name="modulo_id" value="{{ $moduloId }}">
                            @else
                                <select name="modulo_id" class="form-select @error('modulo_id') is-invalid @enderror" required>
                                    <option value="">Selecciona un módulo</option>
                                    @foreach(($modulos ?? []) as $m)
                                        <option value="{{ $m->id }}" {{ old('modulo_id') == $m->id ? 'selected' : '' }}>
                                            {{ $m->curso->titulo ?? 'Curso' }} - {{ $m->titulo }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                            @error('modulo_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Título -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Título de la Lección</label>
                            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                                   value="{{ old('titulo', $leccion->titulo ?? '') }}" required>
                            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Tipo y Orden -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted small">Tipo de Lección</label>
                            <select name="tipo" class="form-select @error('tipo') is-invalid @enderror" required>
                                @foreach(['video' => 'Video', 'lectura' => 'Lectura', 'examen' => 'Examen', 'taller' => 'Taller', 'codigo' => 'Código'] as $valor => $texto)
                                    <option value="{{ $valor }}" {{ old('tipo', $leccion->tipo ?? '') == $valor ? 'selected' : '' }}>{{ $texto }}</option>
                                @endforeach
                            </select>
                            @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted small">Orden</label>
                            <input type="number" name="orden" class="form-control @error('orden') is-invalid @enderror"
                                   value="{{ old('orden', $leccion->orden ?? 1) }}" required min="1">
                            @error('orden') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- URL y Duración -->
                        <div class="col-md-8">
                            <label class="form-label fw-semibold text-muted small">URL del contenido (Opcional)</label>
                            <input type="url" name="url_contenido" class="form-control @error('url_contenido') is-invalid @enderror"
                                   value="{{ old('url_contenido', $leccion->url_contenido ?? '') }}">
                            @error('url_contenido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-muted small">Duración (min)</label>
                            <input type="number" name="duracion_min" class="form-control @error('duracion_min') is-invalid @enderror"
                                   value="{{ old('duracion_min', $leccion->duracion_min ?? '') }}" min="0">
                            @error('duracion_min') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Contenido -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-muted small">Contenido de texto (Opcional)</label>
                            <textarea name="contenido" class="form-control @error('contenido') is-invalid @enderror" rows="3">{{ old('contenido', $leccion->contenido ?? '') }}</textarea>
                            @error('contenido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Es Preview -->
                        <div class="col-md-12">
                            <div class="form-check form-switch bg-light p-3 rounded border">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="es_preview" id="es_preview" value="1"
                                       {{ old('es_preview', $leccion->es_preview ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label fw-medium" for="es_preview">¿Es una lección de vista previa (Gratis)?</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-top-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save me-1"></i> {{ $esEdicion ? 'Actualizar' : 'Guardar' }} Lección
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>