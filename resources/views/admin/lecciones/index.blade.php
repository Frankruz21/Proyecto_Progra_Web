@extends('layouts.admin')

@section('title', 'Gestión de Lecciones')
@section('page-title', 'Lecciones')

@section('content')
<div class="card border-0 rounded-4 shadow-sm">
    <<div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex align-items-center w-100">>
        <div>
            <h4 class="fw-bold text-dark mb-0">
                @if(isset($moduloFiltrado))
                    Lecciones: <span class="text-success">{{ $moduloFiltrado->titulo }}</span>
                @else
                    Lista de Lecciones
                @endif
            </h4>
            <small class="text-muted">
                {{ $lecciones->count() }} lecciones {{ isset($moduloFiltrado) ? 'en este módulo' : 'en total' }}
            </small>
        </div>
        <button type="button" class="btn btn-success rounded-pill px-4 shadow-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modalCrearLeccion">
            <i class="bi bi-plus-lg me-1"></i> Nueva Lección
        </button>
    </div>

    <div class="card-body p-4">
        @php
            $columnas = [
                [
                    'label' => 'Lección', 'campo' => 'titulo', 'tipo' => 'avatar', 'icono' => 'bi-journal-text',
                    'sub' => fn($l) => ($l->modulo->titulo ?? 'Sin módulo').' · '.($l->modulo->curso->titulo ?? ''),
                ],
                ['label' => 'Tipo', 'tipo' => 'badge', 'render' => fn($l) => ucfirst($l->tipo)],
                ['label' => 'Orden', 'campo' => 'orden', 'tipo' => 'numero', 'align' => 'center'],
                [
                    'label' => 'Duración', 'tipo' => 'numero', 'align' => 'center',
                    'render' => fn($l) => $l->duracion_min ? $l->duracion_min.' min' : '-',
                ],
                ['label' => 'Preview', 'campo' => 'es_preview', 'tipo' => 'booleano', 'align' => 'center'],
            ];
        @endphp

        <x-tabla-dinamica
            :columnas="$columnas"
            :filas="$lecciones"
            ruta="admin.lecciones"
            :botones="['editar', 'eliminar']"
            modal-editar="modalCrearLeccion"
            :eliminar-ajax="true"
            vacio="No hay lecciones registradas todavía."
        />
    </div>
</div>

<x-modales.create-leccion-modal :moduloId="$moduloFiltrado->id ?? null" />

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('modalCrearLeccion');
        const form = modal.querySelector('form');
        const modalTitle = modal.querySelector('.modal-title');
        const btnSubmit = modal.querySelector('button[type="submit"]');

        document.querySelectorAll('.btn-editar-modal').forEach(boton => {
            boton.addEventListener('click', function() {
                const leccion = JSON.parse(this.dataset.registro);

                form.action = `/admin/lecciones/${leccion.id}`;

                let methodInput = form.querySelector('input[name="_method"]');
                if (!methodInput) {
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    form.appendChild(methodInput);
                }

                form.querySelector('input[name="titulo"]').value = leccion.titulo;
                form.querySelector('select[name="tipo"]').value = leccion.tipo;
                form.querySelector('input[name="orden"]').value = leccion.orden;
                form.querySelector('input[name="url_contenido"]').value = leccion.url_contenido || '';
                form.querySelector('input[name="duracion_min"]').value = leccion.duracion_min || '';
                form.querySelector('textarea[name="contenido"]').value = leccion.contenido || '';
                form.querySelector('input[name="es_preview"]').checked = (leccion.es_preview == 1);

                form.querySelector('[name="modulo_id"]').value = leccion.modulo_id;
                const selectVisual = form.querySelector('select[disabled]');
                if (selectVisual) selectVisual.value = leccion.modulo_id;

                modalTitle.innerHTML = '<i class="bi bi-pencil-square text-primary me-2"></i>Editar Lección';
                btnSubmit.innerHTML = '<i class="bi bi-save me-1"></i> Actualizar Lección';
            });
        });

        modal.addEventListener('hidden.bs.modal', function () {
            form.reset();
            form.action = "{{ route('admin.lecciones.store') }}";
            form.querySelector('input[name="_method"]')?.remove();
            modalTitle.innerHTML = '<i class="bi bi-plus-circle text-success me-2"></i>Crear Nueva Lección';
            btnSubmit.innerHTML = '<i class="bi bi-save me-1"></i> Guardar Lección';
        });
    });
</script>
@endpush

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new bootstrap.Modal(document.getElementById('modalCrearLeccion')).show();
        });
    </script>
@endif
@endsection