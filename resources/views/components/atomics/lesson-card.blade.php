<div class="flex items-center gap-3 p-2 rounded-xl hover:bg-white/10 transition cursor-pointer group">
    <!-- Imagen miniatura -->
    <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0 relative">
        <img src="{{ $imagen }}" alt="{{ $titulo }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
            <i class="bi bi-play-fill text-white text-lg"></i>
        </div>
    </div>

    <!-- Texto -->
    <div class="flex-grow">
        <h4 class="text-white text-sm font-semibold leading-tight line-clamp-1">{{ $titulo }}</h4>
        <p class="text-gray-400 text-xs mt-0.5">{{ $progreso }}</p>
    </div>

    <!-- Botón Play circular a la derecha -->
    <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition">
        <i class="bi bi-play-fill text-white text-lg ml-0.5"></i>
    </div>
</div>