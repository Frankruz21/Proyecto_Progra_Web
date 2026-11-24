@php
    $esEdicion = isset($leccion);
    $action = $esEdicion ? route('admin.lecciones.update', $leccion->id) : route('admin.lecciones.store');
    $tituloModal = $esEdicion ? 'Editar Lección' : 'Crear Nueva Lección';
    $icono = $esEdicion ? 'bi-pencil-square text-primary' : 'bi-plus-circle-fill text-primary';
@endphp

<div class="modal fade" id="modalCrearLeccion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="background:#f8faff; color:#1e293b; border-radius:20px;">

            <form action="{{ $action }}" method="POST">
                @csrf
                @if($esEdicion)
                    @method('PUT')
                @endif

                <div class="modal-header border-bottom-0 pb-0" style="background:transparent;">
                    <h5 class="modal-title fw-bold">
                        <i class="bi {{ $icono }} me-2"></i>{{ $tituloModal }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-3">

                        <!-- Módulo actual lo fija el botón Nueva Lección que abre el modal -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Módulo / Curso</label>
                            <input type="text" id="modulo_nombre" class="form-control border-0 shadow-sm"
                                   style="background:#eef2f7; color:#475569; border-radius:12px;"
                                   readonly tabindex="-1" placeholder="Abre este formulario desde el botón de un módulo">
                            <input type="hidden" name="modulo_id" id="modulo_id_input"
                                   value="{{ old('modulo_id', $leccion->modulo_id ?? '') }}">
                            @error('modulo_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Título -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Título de la Lección</label>
                            <input type="text" name="titulo"
                                   class="form-control border-0 shadow-sm @error('titulo') is-invalid @enderror"
                                   style="background:#ffffff; border-radius:12px;"
                                   value="{{ old('titulo', $leccion->titulo ?? '') }}" required>
                            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Tipo y Orden -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-secondary">Tipo de Lección</label>
                            <select name="tipo"
                                    class="form-select border-0 shadow-sm @error('tipo') is-invalid @enderror"
                                    style="background:#ffffff; border-radius:12px;" required>
                                @foreach(['video' => 'Video', 'lectura' => 'Lectura', 'examen' => 'Examen', 'taller' => 'Taller', 'codigo' => 'Código'] as $valor => $texto)
                                    <option value="{{ $valor }}" {{ old('tipo', $leccion->tipo ?? '') == $valor ? 'selected' : '' }}>{{ $texto }}</option>
                                @endforeach
                            </select>
                            @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-secondary">Orden</label>
                            <input type="number" name="orden"
                                   class="form-control border-0 shadow-sm @error('orden') is-invalid @enderror"
                                   style="background:#ffffff; border-radius:12px;"
                                   value="{{ old('orden', $leccion->orden ?? 1) }}" required min="1">
                            @error('orden') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- URL y Duración -->
                        <div class="col-md-8">
                            <label class="form-label fw-semibold small text-secondary">URL del contenido (Opcional)</label>
                            <input type="url" name="url_contenido"
                                   class="form-control border-0 shadow-sm @error('url_contenido') is-invalid @enderror"
                                   style="background:#ffffff; border-radius:12px;"
                                   value="{{ old('url_contenido', $leccion->url_contenido ?? '') }}">
                            @error('url_contenido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-secondary">Duración (min)</label>
                            <input type="number" name="duracion_min"
                                   class="form-control border-0 shadow-sm @error('duracion_min') is-invalid @enderror"
                                   style="background:#ffffff; border-radius:12px;"
                                   value="{{ old('duracion_min', $leccion->duracion_min ?? '') }}" min="0">
                            @error('duracion_min') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Contenido -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Contenido de texto (Opcional)</label>
                            <textarea name="contenido"
                                      class="form-control border-0 shadow-sm @error('contenido') is-invalid @enderror"
                                      style="background:#ffffff; border-radius:12px;"
                                      rows="3">{{ old('contenido', $leccion->contenido ?? '') }}</textarea>
                            @error('contenido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Es Preview -->
                        <div class="col-md-12">
                            <div class="form-check form-switch border-0 shadow-sm p-3"
                                 style="background:#e8f0fe; color:#1d4ed8; border-radius:12px;">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="es_preview" id="es_preview" value="1"
                                       {{ old('es_preview', $leccion->es_preview ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label fw-medium" for="es_preview">¿Es una lección de vista previa (Gratis)?</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light px-4 rounded-pill shadow-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow fw-semibold"
                            style="background:linear-gradient(135deg,#3b82f6,#2563eb); border:none;">
                        <i class="bi bi-save me-1"></i> {{ $esEdicion ? 'Actualizar' : 'Guardar' }} Lección
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- Fija el módulo según el botón que abrió el modal --}}
<script>
    (function () {
        if (window.__modalLeccionInit) return;
        window.__modalLeccionInit = true;

        document.addEventListener('show.bs.modal', function (event) {
            if (event.target.id !== 'modalCrearLeccion') return;

            const btn = event.relatedTarget;
            if (!btn || !btn.dataset.moduloId) return; // botón de editar

            const modal = event.target;
            modal.querySelector('form').reset();
            modal.querySelector('#modulo_id_input').value = btn.dataset.moduloId;
            modal.querySelector('#modulo_nombre').value = btn.dataset.moduloTitulo ?? '';
        });

        // Evita guardar sin módulo
        document.addEventListener('submit', function (e) {
            if (!e.target.closest('#modalCrearLeccion')) return;
            const input = document.getElementById('modulo_id_input');
            if (input && !input.value) {
                e.preventDefault();
                alert('Abre el formulario desde el botón "Nueva Lección" de un módulo.');
            }
        });
    })();
</script>