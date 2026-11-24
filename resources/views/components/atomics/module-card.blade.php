<div class="relative rounded-2xl overflow-hidden group cursor-pointer {{ $esGrande ? 'h-64' : 'h-40' }}">
    <!-- Imagen -->
    <img src="{{ $imagen }}" alt="{{ $titulo }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
    
    <!-- Degradado -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

    <!-- Botón Play flotante -->
    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <div class="w-12 h-12 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center border border-white/50">
            <i class="bi bi-play-fill text-white text-2xl ml-1"></i>
        </div>
    </div>

    <!-- Título inferior -->
    <div class="absolute bottom-0 left-0 p-4 w-full">
        <h3 class="text-white font-bold text-sm leading-tight line-clamp-2">{{ $titulo }}</h3>
    </div>
</div>