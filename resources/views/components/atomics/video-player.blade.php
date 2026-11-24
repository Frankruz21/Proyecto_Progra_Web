<div class="relative rounded-3xl overflow-hidden shadow-2xl h-[400px] w-full group bg-black">
    
    @if($urlVideo)
        {{-- Si hay video, mostramos el iframe --}}
        <iframe 
            class="absolute inset-0 w-full h-full" 
            src="{{ $urlVideo }}" 
            title="Reproductor de video" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    @else
        {{-- Si no hay video, mostramos la imagen de fondo --}}
        <img src="{{ $imagenFondo }}" alt="Video Background" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700">
        
        <!-- Degradado para legibilidad -->
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent"></div>

        <!-- Contenido (Titulo, descripcion y botones) -->
        <div class="absolute inset-0 p-8 flex flex-col justify-end text-white">
            
            <!-- Badges superiores -->
            <div class="absolute top-6 left-6 flex gap-2">
                <span class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold border border-white/10">Trending Course</span>
                <span class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold border border-white/10">{{ $categoria }}</span>
            </div>

            <!-- Título y descripción -->
            <div class="max-w-xl mb-6">
                <h1 class="text-4xl font-bold mb-2 leading-tight">{{ $titulo }}</h1>
                <p class="text-sm text-gray-300 line-clamp-2">{{ $descripcion }}</p>
            </div>

            <!-- Botones -->
            <div class="flex items-center gap-4">
                <button class="flex items-center gap-2 bg-white text-gray-900 px-6 py-2.5 rounded-full font-semibold hover:bg-gray-100 transition">
                    <i class="bi bi-play-fill text-xl"></i> Start
                </button>
                <button class="flex items-center gap-2 bg-transparent border border-white/30 text-white px-6 py-2.5 rounded-full font-semibold hover:bg-white/10 transition">
                    <i class="bi bi-journal-text"></i> Guidebook
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-full bg-white/20 hover:bg-white/30 transition">
                    <i class="bi bi-bookmark-fill"></i>
                </button>

                <!-- Flechas de navegación -->
                <div class="ml-auto flex gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>