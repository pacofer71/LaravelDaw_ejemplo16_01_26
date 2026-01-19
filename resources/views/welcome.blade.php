<x-layouts.app>
    <x-miscomponentes.base>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
            @foreach ($cursos as $item)
                <article
                    @class([
                        "group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden",
                        "col-span-1 md:col-span-2"=>$loop->first
                        ])>
                    <!-- Imagen -->
                    <figure class="relative h-48 w-full overflow-hidden">
                        <img src="{{ Storage::url($item->imagen) }}" alt="Miniatura del curso"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        <!-- Overlay gradiente para mejorar legibilidad -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </figure>

                    <!-- Contenido -->
                    <div class="p-5 space-y-4">
                        <!-- Título -->
                        <h3 class="text-xl font-bold text-gray-900 leading-tight">
                            {{ $item->nombre }}
                        </h3>

                        <!-- Descripción -->
                        <p class="text-sm text-gray-600">
                            {{ $item->descripcion }}
                        </p>
                        <!-- Categoría -->
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-tag text-orange-500"></i>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full text-white"
                                style="background-color:{{ $item->category->color }}">
                                {{ $item->category->nombre }}
                            </span>
                        </div>
                        <!-- Etiquetas -->
                        <div class="flex flex-wrap gap-2">
                            @foreach ($item->tags as $tag)
                                <span class="px-3 py-1 text-xs italic font-semibold rounded-full text-white"
                                    style="background-color:{{ $tag->color }}">
                                    # {{ $tag->nombre }}
                                </span>
                            @endforeach

                        </div>

                        <!-- Email del propietario -->
                        <p
                            class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-blue-600 transition-colors">
                            <i class="fa-solid fa-envelope"></i>
                            <span>{{ $item->user->email }}</span>
                        </p>
                    </div>

                    <!-- Hover overlay con acción rápida -->
                    <div
                        class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <button
                            class="bg-white text-gray-900 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition">
                            Ver curso
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-1">
            {{ $cursos->links() }}
        </div>
    </x-miscomponentes.base>
</x-layouts.app>
