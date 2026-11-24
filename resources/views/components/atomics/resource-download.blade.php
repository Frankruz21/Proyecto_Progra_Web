<a href="{{ asset('storage/' . $ruta) }}" target="_blank" class="flex items-center justify-between p-2 rounded-lg bg-white/5 hover:bg-white/10 transition-colors group border border-white/10">
    <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded bg-gray-700 flex items-center justify-center text-gray-300 group-hover:text-white transition">
            <i class="bi bi-file-earmark-arrow-down"></i>
        </div>
        <div>
            <p class="text-white text-xs font-medium line-clamp-1">{{ $titulo }}</p>
            <p class="text-gray-400 text-[10px] uppercase">{{ $tipo }} {{ $peso ? '• '.$peso : '' }}</p>
        </div>
    </div>
    <i class="bi bi-download text-gray-500 group-hover:text-white transition"></i>
</a>