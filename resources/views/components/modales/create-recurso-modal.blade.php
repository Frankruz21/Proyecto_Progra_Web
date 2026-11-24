<div class="modal fade" id="modalCrearRecurso" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="background:#f8faff; color:#1e293b; border-radius:20px;">

            <form id="formCrearRecurso" enctype="multipart/form-data">
                @csrf

                <div class="modal-header border-bottom-0 pb-0" style="background:transparent;">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-paperclip text-success me-2"></i>Subir Recurso
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-3">

                        <!-- Lección asignada -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Lección asignada</label>
                            <input type="text" id="recurso_leccion_titulo" class="form-control border-0 shadow-sm" style="background:#eef2f7; color:#475569; border-radius:12px;" disabled>
                            <input type="hidden" name="leccion_id" id="recurso_leccion_id">
                        </div>

                        <!-- Título del recurso -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Título del Recurso</label>
                            <input type="text" name="titulo" class="form-control border-0 shadow-sm @error('titulo') is-invalid @enderror" style="background:#ffffff; border-radius:12px;" value="{{ old('titulo') }}" required>
                            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Tipo de recurso -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Tipo</label>
                            <select name="tipo" class="form-select border-0 shadow-sm @error('tipo') is-invalid @enderror" style="background:#ffffff; border-radius:12px;" required>
                                <option value="guia" {{ old('tipo') == 'guia' ? 'selected' : '' }}>Guía</option>
                                <option value="silabario" {{ old('tipo') == 'silabario' ? 'selected' : '' }}>Silabario</option>
                                <option value="codigo_fuente" {{ old('tipo') == 'codigo_fuente' ? 'selected' : '' }}>Código Fuente</option>
                            </select>
                            @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Archivo -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Archivo (Máx. 10MB)</label>
                            <input type="file" name="archivo" class="form-control border-0 shadow-sm @error('archivo') is-invalid @enderror" style="background:#ffffff; border-radius:12px;" required>
                            @error('archivo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                    </div>
                </div>

                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light px-4 rounded-pill shadow-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success px-4 rounded-pill shadow fw-semibold" style="background:linear-gradient(135deg,#10b981,#059669); border:none;">
                        <i class="bi bi-cloud-arrow-up me-1"></i> Subir
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>