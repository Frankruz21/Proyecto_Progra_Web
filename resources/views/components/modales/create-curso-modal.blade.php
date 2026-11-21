<div class="modal fade" id="modalCrearCurso" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            
            <form action="{{ route('admin.cursos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle text-success me-2"></i>Crear Nuevo Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <!-- Título -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small">Título del Curso</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>

                        <!-- Descripción Corta -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small">Descripción Corta</label>
                            <textarea name="descripcion_corta" class="form-control" rows="2" required></textarea>
                        </div>

                        <!-- Descripción Larga -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small">Descripción Completa</label>
                            <textarea name="descripcion" class="form-control" rows="3" required></textarea>
                        </div>

                        <!-- Requisitos y Objetivos -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Requisitos</label>
                            <textarea name="requisitos" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Objetivos</label>
                            <textarea name="objetivos" class="form-control" rows="2" required></textarea>
                        </div>

                        <!-- Categoría, Nivel, Idioma -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Categoría</label>
                            <select name="categoria_id" class="form-select" required>
                                <option value="">Seleccione...</option>
                                <option value="1">Programación</option>
                                <option value="2">Diseño</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Nivel</label>
                            <select name="nivel_id" class="form-select" required>
                                <option value="">Seleccione...</option>
                                <option value="1">Básico</option>
                                <option value="2">Intermedio</option>
                                <option value="3">Avanzado</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Idioma</label>
                            <select name="idioma_id" class="form-select" required>
                                <option value="">Seleccione...</option>
                                <option value="1">Español</option>
                                <option value="2">Inglés</option>
                            </select>
                        </div>

                        <!-- Precio y Duración -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Precio (L.)</label>
                            <input type="number" name="precio" class="form-control" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Duración (Horas)</label>
                            <input type="number" name="duracion_horas" class="form-control" step="0.1" min="0" required>
                        </div>

                        <!-- Portada y Video -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Imagen de Portada</label>
                            <input type="file" name="portada" class="form-control" accept="image/*" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">URL Video Intro (Opcional)</label>
                            <input type="url" name="video_intro_url" class="form-control">
                        </div>

                        <!-- Checkbox Programación -->
                        <div class="col-md-12 mt-3">
                            <div class="form-check form-switch bg-light p-3 rounded border">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="es_programacion" id="es_programacion" value="1" checked>
                                <label class="form-check-label fw-medium" for="es_programacion">¿Es un curso de programación?</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer border-top-0 bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success px-4"><i class="bi bi-save me-1"></i> Guardar Curso</button>
                </div>
            </form>

        </div>
    </div>
</div>