<div class="modal fade" id="modalCrearModulo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="background:#f8faff; color:#1e293b; border-radius:20px;">

            <form action="{{ route('admin.modulos.store') }}" method="POST">
                @csrf

                <!-- ID del curso oculto -->
                <input type="hidden" name="curso_id" value="{{ $cursoId }}">

                <div class="modal-header border-bottom-0 pb-0" style="background:transparent;">
                    <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle-fill text-primary me-2"></i>Crear Nuevo Módulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-3">

                        <!-- Aviso visual de a qué curso pertenece -->
                        @if($cursoId)
                            <div class="col-md-12">
                                <div class="alert border-0 shadow-sm py-2 mb-0 rounded-3" style="background:#e8f0fe; color:#1d4ed8;">
                                    <i class="bi bi-info-circle me-1"></i> El módulo se creará para el curso seleccionado.
                                </div>
                            </div>
                        @endif

                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Título del Módulo</label>
                            <input type="text" name="titulo" class="form-control border-0 shadow-sm @error('titulo') is-invalid @enderror" style="background:#ffffff; border-radius:12px;" value="{{ old('titulo') }}" required>
                            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Descripción (Opcional)</label>
                            <textarea name="descripcion" class="form-control border-0 shadow-sm" rows="3" style="background:#ffffff; border-radius:12px;">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Orden</label>
                            <input type="number" name="orden" class="form-control border-0 shadow-sm @error('orden') is-invalid @enderror" style="background:#ffffff; border-radius:12px;" value="{{ old('orden', 1) }}" required min="1">
                            @error('orden') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light px-4 rounded-pill shadow-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow fw-semibold" style="background:linear-gradient(135deg,#3b82f6,#2563eb); border:none;">
                        <i class="bi bi-save me-1"></i> Guardar Módulo
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>