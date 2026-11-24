
(function () {
    if (window.__leccionesInit) return;
    window.__leccionesInit = true;

    const API = '/api/lecciones';
    const MODAL_ID = 'modalCrearLeccion';
    const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';

    let moduloActualId = null; 
    let tbodyActual = null;     
    let leccionEditando = null;  

    const esc = (s) => String(s ?? '').replace(/[&<>"']/g, c => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[c]));
    const cap = (s) => (s ? s.charAt(0).toUpperCase() + s.slice(1) : '');

    // Id del módulo a partir de cualquier elemento dentro la tarjeta
    const moduloDe = (el) =>
        el.closest('.card-body')?.querySelector('.btn-abrir-leccion')?.dataset.moduloId ?? null;

    const SPINNER = '<tr><td colspan="4" class="text-center py-3"><div class="spinner-border spinner-border-sm text-primary"></div></td></tr>';
    const VACIO = '<tr><td colspan="4" class="text-center text-muted py-4">No hay lecciones registradas en este módulo.</td></tr>';
    const ERROR = '<tr><td colspan="4" class="text-center text-danger py-3">No se pudieron cargar las lecciones.</td></tr>';

    // Misma estructura de filas que el parcial Blade
    const filaHTML = (l) => `
        <tr>
            <td class="ps-3">
                <button type="button" class="btn btn-sm btn-light toggle-recursos" data-leccion-id="${l.id}">
                    <i class="bi bi-chevron-down"></i>
                </button>
            </td>
            <td class="fw-medium text-dark">${esc(l.titulo)}</td>
            <td>
                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-2 py-1">${esc(cap(l.tipo))}</span>
            </td>
            <td class="text-end pe-3">
                <div class="btn-group shadow-sm">
                    <button type="button" class="btn btn-sm btn-outline-success btn-abrir-recurso"
                            data-leccion-id="${l.id}" data-leccion-titulo="${esc(l.titulo)}" title="Añadir Recurso">
                        <i class="bi bi-plus-lg"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-primary btn-editar-leccion"
                            data-bs-toggle="modal" data-bs-target="#${MODAL_ID}"
                            data-leccion="${esc(JSON.stringify(l))}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger btn-eliminar-leccion" data-id="${l.id}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        <tr class="d-none fila-recursos" id="recursos-leccion-${l.id}">
            <td></td>
            <td colspan="3">
                <div class="p-3 bg-light rounded border">
                    <table class="table table-sm bg-white mb-0">
                        <thead>
                            <tr><th>Archivo</th><th>Tipo</th><th>Peso</th><th class="text-end">Acciones</th></tr>
                        </thead>
                        <tbody class="tbody-recursos"></tbody>
                    </table>
                </div>
            </td>
        </tr>`;

    // Cargar las lecciones de un módulo vía API y repintar su tabla
    function cargarLecciones(moduloId, tbody) {
        if (!tbody || !moduloId) return location.reload();

        tbody.innerHTML = SPINNER;

        return fetch(`${API}?modulo_id=${encodeURIComponent(moduloId)}`, { headers: { 'Accept': 'application/json' } })
            .then(res => {
                if (!res.ok) throw new Error(`HTTP ${res.status}`);
                return res.json();
            })
            .then(data => {
                const lecciones = Array.isArray(data) ? data : (data.data ?? []);
                tbody.innerHTML = lecciones.length ? lecciones.map(filaHTML).join('') : VACIO;
            })
            .catch(err => {
                console.error('Error cargando lecciones:', err);
                tbody.innerHTML = ERROR;
            });
    }

    // Recordar módulo 
    document.addEventListener('click', function (e) {
        const nueva = e.target.closest('.btn-abrir-leccion');
        if (nueva) {
            leccionEditando = null;
            moduloActualId = nueva.dataset.moduloId ?? moduloDe(nueva);
            tbodyActual = nueva.closest('.card-body')?.querySelector('table.table-hover > tbody') ?? null;
            return;
        }

        const editar = e.target.closest('.btn-editar-leccion');
        if (editar) {
            try {
                leccionEditando = JSON.parse(editar.dataset.leccion);
            } catch (_) {
                leccionEditando = { id: editar.closest('tr')?.querySelector('.btn-eliminar-leccion')?.dataset.id };
            }
            moduloActualId = moduloDe(editar);
            tbodyActual = editar.closest('tbody');
        }
    });

    document.addEventListener('hidden.bs.modal', function (e) {
        if (e.target.id === MODAL_ID) leccionEditando = null;
    });

    // ELIMINAR 
    document.addEventListener('click', async function (e) {
        const btn = e.target.closest('.btn-eliminar-leccion');
        if (!btn) return;

        e.preventDefault();
        e.stopImmediatePropagation();

        if (!confirm('¿Eliminar esta lección?')) return;

        const moduloId = moduloDe(btn);
        const tbody = btn.closest('tbody');
        btn.disabled = true;

        try {
            const res = await fetch(`${API}/${btn.dataset.id}`, {
                method: 'DELETE',
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf }
            });
            if (!res.ok) throw new Error(`HTTP ${res.status}`);
            await cargarLecciones(moduloId, tbody);
        } catch (err) {
            console.error('Error eliminando lección:', err);
            alert('No se pudo eliminar la lección.');
            btn.disabled = false;
        }
    }, true);

    // CREAR / EDITAR 
    document.addEventListener('submit', async function (e) {
        const form = e.target;
        if (!form.matches(`#${MODAL_ID} form`)) return;

        e.preventDefault();
        e.stopImmediatePropagation();

        const formData = new FormData(form);
        let url = API;
        if (leccionEditando) {
            url = `${API}/${leccionEditando.id}`;
            formData.set('_method', 'PUT');
        }

        const moduloId = moduloActualId || document.getElementById('modulo_id_input')?.value;
        const submitBtn = form.querySelector('[type="submit"]');
        if (submitBtn) submitBtn.disabled = true;

        try {
            const res = await fetch(url, {
                method: 'POST',
                body: formData,
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf }
            });

            if (res.status === 422) {
                const err = await res.json();
                alert(Object.values(err.errors || {}).flat().join('\n') || 'Revisa los datos.');
                return;
            }
            if (!res.ok) throw new Error(`HTTP ${res.status}`);

            bootstrap.Modal.getInstance(document.getElementById(MODAL_ID))?.hide();
            form.reset();
            await cargarLecciones(moduloId, tbodyActual);
        } catch (err) {
            console.error('Error guardando lección:', err);
            alert('No se pudo guardar la lección.');
        } finally {
            if (submitBtn) submitBtn.disabled = false;
        }
    }, true);
})();