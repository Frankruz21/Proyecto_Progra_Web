para kpi-card.blade.php

para usar en cualquier vista: 
```
<div class="row">
    <div class="col-md-4">
        <x-atomics.kpi-card 
            titulo="HUMIDITY" 
            valor="80%" 
            colorFondo="#0B3B60" 
            textoInferior="The dew point is 5 degree right now" 
        />
    </div>

    <div class="col-md-4">
        <x-atomics.kpi-card 
            titulo="ESTUDIANTES" 
            valor="1,250" 
            colorFondo="#143D60" 
        />
    </div>
</div>
```