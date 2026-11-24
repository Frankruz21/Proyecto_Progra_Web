{{-- 
    Componente KPI Reutilizable.
    Uso: 
    <x-atomics.kpi-card titulo="HUMIDITY" valor="80%" colorFondo="#0B3B60" textoInferior="The dew point is 5 degree right now" />
--}}

<div class="relative overflow-hidden rounded-4 p-4 text-white shadow-sm d-flex flex-column justify-content-between" 
     style="background-color: {{ $colorFondo }}; min-height: 180px; border-radius: 25px !important;">
    
    <!-- Titulo -->
    <div class="z-1">
        <h6 class="fw-semibold text-uppercase mb-1" style="font-size: 0.75rem; letter-spacing: 1px; opacity: 0.8;">
            {{ $titulo }}
        </h6>
        
        <!-- Valor -->
        <h2 class="fw-bold mb-0" style="font-size: 2.5rem; line-height: 1;">
            {{ $valor }}
        </h2>
    </div>

    <!-- Grafico simulado (Curva y linea) -->
    <div class="position-absolute bottom-0 start-0 w-100 z-0" style="height: 60%;">
        <!-- Curva de fondo -->
        <svg viewBox="0 0 100 30" preserveAspectRatio="none" class="w-100 h-100 position-absolute bottom-0">
            <path d="M0,15 C30,5 70,25 100,10 L100,30 L0,30 Z" fill="#1D4ED8" opacity="0.3"></path>
            <path d="M0,20 C40,10 60,25 100,15 L100,30 L0,30 Z" fill="#2563EB" opacity="0.5"></path>
        </svg>
        
        <!-- Linea vertical y punto -->
        <div class="position-absolute top-0 start-50 h-100 d-flex flex-column align-items-center">
            <div class="w-100 h-100" style="border-left: 2px solid #3B82F6; position: absolute; top: 0;"></div>
            <div class="rounded-circle bg-white border border-3" 
                 style="width: 16px; height: 16px; border-color: #3B82F6 !important; position: absolute; top: 35%;">
            </div>
        </div>
    </div>

    <!-- Texto Inferior -->
    @if($textoInferior)
        <div class="z-1 mt-auto pt-4" style="font-size: 0.8rem; max-width: 70%; line-height: 1.2;">
            {{ $textoInferior }}
        </div>
    @endif
</div>