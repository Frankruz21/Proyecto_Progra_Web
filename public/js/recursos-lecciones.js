(function () {
    if (window.__recursosLeccionesInit) return;
    window.__recursosLeccionesInit = true;

    console.log('recursos: script cargado');

    const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';

    const esc = (s) => String(s ?? '').replace(/[&<>"']/g, c => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[c]));

    // Cargar recursos de una lección vía API
    function cargarRecursos(leccionId) {
        const tbody = document.querySelector(`#recursos-leccion-${leccionId} .tbody-recursos`);
        if (!tbody) return;

        tbody.innerHTML = '<tr><td colspan="4" class="text-center"><div class="spinner-border spinner-border-sm text-primary"></div></td></tr>';

        fetch(`/api/lecciones/${leccionId}/recursos`, { headers: { 'Accept': 'application/json' } })
            .then(res => {
                if (!res.ok) throw new Error(`HTTP ${res.status}`);
                return res.json();
            })
            .then(recursos => {
                if (!recursos.length) {
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center text-muted">No hay recursos subidos.</td></tr>';
                    return;
                }
                tbody.innerHTML = recursos.map(rec => {
                    const pesoMB = (rec.tamano_bytes / 1024 / 1024).toFixed(2);
                    return `
                        <tr>
                            <td><i class="bi bi-file-earmark-arrow-down text-danger me-2"></i>${esc(rec.titulo)}</td>
                            <td><span class="badge bg-info text-dark">${esc(rec.tipo)}</span></td>
                            <td>${pesoMB} MB</td>
                            <td class="text-end">
                                <a href="/storage/${esc(rec.ruta)}" target="_blank" class="btn btn-sm btn-outline-success"><i class="bi bi-download"></i></a>
                                <button type="button" class="btn btn-sm btn-outline-danger btn-eliminar-recurso" data-id="${rec.id}" data-leccion-id="${leccionId}"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>`;
                }).join('');
            })
            .catch(err => {
                console.error('Error cargando recursos:', err);
                tbody.innerHTML = '<tr><td colspan="4" class="text-center text-danger">No se pudieron cargar los recursos.</td></tr>';
            });
    }

    document.addEventListener('click', function (e) {

        // Abrir modal de lección con el módulo seleccionado
        const abrirLeccion = e.target.closest('.btn-abrir-leccion');
        if (abrirLeccion) {
            const modalEl = document.getElementById('modalCrearLeccion');
            if (!modalEl) return;

            modalEl.querySelector('form')?.reset();
            const idInput = document.getElementById('modulo_id_input');
            const nombreInput = document.getElementById('modulo_nombre');
            if (idInput) idInput.value = abrirLeccion.dataset.moduloId ?? '';
            if (nombreInput) nombreInput.value = abrirLeccion.dataset.moduloTitulo ?? '';

            bootstrap.Modal.getOrCreateInstance(modalEl).show();
            return;
        }

        // Desplegar sublista de recursos
        const toggle = e.target.closest('.toggle-recursos');
        if (toggle) {
            const id = toggle.dataset.leccionId;
            const fila = document.getElementById(`recursos-leccion-${id}`);
            const icono = toggle.querySelector('i');

            fila.classList.toggle('d-none');
            const abierto = !fila.classList.contains('d-none');
            icono.classList.toggle('bi-chevron-up', abierto);
            icono.classList.toggle('bi-chevron-down', !abierto);

            if (abierto) cargarRecursos(id);
            return;
        }

        // Abrir modal de recurso con la lección seleccionada
        const abrir = e.target.closest('.btn-abrir-recurso');
        if (abrir) {
            document.getElementById('recurso_leccion_id').value = abrir.dataset.leccionId;
            document.getElementById('recurso_leccion_titulo').value = abrir.dataset.leccionTitulo;
            bootstrap.Modal.getOrCreateInstance(document.getElementById('modalCrearRecurso')).show();
            return;
        }

        // Eliminar recurso
        const del = e.target.closest('.btn-eliminar-recurso');
        if (del) {
            if (!confirm('¿Eliminar este recurso?')) return;
            fetch(`/api/recursos/${del.dataset.id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' }
            })
            .then(() => cargarRecursos(del.dataset.leccionId))
            .catch(err => console.error('Error eliminando recurso:', err));
        }
    });

    // Enviar formulario de recurso (AJAX)
    document.addEventListener('submit', function (e) {
        if (e.target.id !== 'formCrearRecurso') return;
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        fetch('/api/recursos', {
            method: 'POST',
            body: formData,
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('modalCrearRecurso')).hide();
                cargarRecursos(formData.get('leccion_id'));
                form.reset();
            } else {
                alert('Error al subir el archivo.');
            }
        })
        .catch(err => {
            console.error('Error subiendo recurso:', err);
            alert('Error al subir el archivo.');
        });
    });
})();