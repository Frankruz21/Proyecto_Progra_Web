<div class="modal fade" id="modalCrearCurso" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="background:#f8faff; color:#1e293b; border-radius:20px;">

            <form action="{{ route('admin.cursos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header border-bottom-0 pb-0" style="background:transparent;">
                    <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle-fill text-primary me-2"></i>Crear Nuevo Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-3">

                        <!-- Título -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Título del Curso</label>
                            <input type="text" name="titulo" class="form-control border-0 shadow-sm" style="background:#ffffff; border-radius:12px;" required>
                        </div>

                        <!-- Descripción Corta -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Descripción Corta</label>
                            <textarea name="descripcion_corta" class="form-control border-0 shadow-sm" rows="2" style="background:#ffffff; border-radius:12px;" required></textarea>
                        </div>

                        <!-- Descripción Larga -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-secondary">Descripción Completa</label>
                            <textarea name="descripcion" class="form-control border-0 shadow-sm" rows="3" style="background:#ffffff; border-radius:12px;" required></textarea>
                        </div>

                        <!-- Requisitos y Objetivos -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-secondary">Requisitos</label>
                            <textarea name="requisitos" class="form-control border-0 shadow-sm" rows="2" style="background:#ffffff; border-radius:12px;" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-secondary">Objetivos</label>
                            <textarea name="objetivos" class="form-control border-0 shadow-sm" rows="2" style="background:#ffffff; border-radius:12px;" required></textarea>
                        </div>

                        <!-- Categoría, Nivel, Idioma -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-secondary">Categoría</label>
                            <select name="categoria_id" class="form-select border-0 shadow-sm" style="background:#ffffff; border-radius:12px;" required>
                                <option value="">Seleccione...</option>
                                <option value="1">Programación</option>
                                <option value="2">Diseño</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-secondary">Nivel</label>
                            <select name="nivel_id" class="form-select border-0 shadow-sm" style="background:#ffffff; border-radius:12px;" required>
                                <option value="">Seleccione...</option>
                                <option value="1">Básico</option>
                                <option value="2">Intermedio</option>
                                <option value="3">Avanzado</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-secondary">Idioma</label>
                            <select name="idioma_id" class="form-select border-0 shadow-sm" style="background:#ffffff; border-radius:12px;" required>
                                <option value="">Seleccione...</option>
                                <option value="1">Español</option>
                                <option value="2">Inglés</option>
                            </select>
                        </div>

                        <!-- Precio y Duración -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-secondary">Precio (L.)</label>
                            <input type="number" name="precio" class="form-control border-0 shadow-sm" step="0.01" min="0" style="background:#ffffff; border-radius:12px;" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-secondary">Duración (Horas)</label>
                            <input type="number" name="duracion_horas" class="form-control border-0 shadow-sm" step="0.1" min="0" style="background:#ffffff; border-radius:12px;" required>
                        </div>

                        <!-- Portada y Video -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-secondary">Imagen de Portada</label>
                            <input type="file" name="portada" class="form-control border-0 shadow-sm" accept="image/jpeg,image/png,image/webp" style="background:#ffffff; border-radius:12px;" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-secondary">URL Video Intro (Opcional)</label>
                            <input type="url" name="video_intro_url" class="form-control border-0 shadow-sm" style="background:#ffffff; border-radius:12px;">
                        </div>

                        <!-- Checkbox -->
                        <div class="col-md-12 mt-3">
                            <div class="form-check form-switch p-3 rounded-3 border-0 shadow-sm d-flex align-items-center" style="background:#e8f0fe;">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="es_programacion" id="es_programacion" value="1" checked>
                                <label class="form-check-label fw-medium" for="es_programacion">¿Es un curso de programación?</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light px-4 rounded-pill shadow-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow fw-semibold" style="background:linear-gradient(135deg,#3b82f6,#2563eb); border:none;">
                        <i class="bi bi-save me-1"></i> Guardar Curso
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>