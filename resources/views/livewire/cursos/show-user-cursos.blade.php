<x-miscomponentes.base>
    <div class="flex justify-between items-center mb-2">
        <x-input type="search" placeholder="Buscar..." wire:model.live="texto" />
    </div>
    @if ($cursos->count())
        <div class="rounded-lg border border-gray-200 shadow-md mb-1">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Imagen</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer"
                            wire:click="ordenar('nombre')">
                            <i class="fas fa-sort mr-1"></i>Nombre
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer"
                            wire:click="ordenar('descripcion')">
                            <i class="fas fa-sort mr-1"></i>Descripción
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer whitespace-nowrap"
                            wire:click="ordenar('cnombre')">
                            <i class="fas fa-sort mr-1"></i>Categoría
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer whitespace-nowrap"
                            wire:click="ordenar('disponible')">
                            <i class="fas fa-sort mr-1"></i>Disponible
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Etiquetas</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach ($cursos as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <img class="h-12 w-12 rounded-full object-cover" src="{{ Storage::url($item->imagen) }}"
                                    alt="Curso de Desarrollo" />
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nombre }}</td>
                            <td class="px-6 py-4 max-w-xs">{{ $item->descripcion }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 font-bold"
                                    style="color:{{ $item->color }}">
                                    {{ $item->cnombre }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span @class([
                                    'inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 font-bold',
                                    'text-red-500' => $item->disponible == 'NO',
                                    'text-green-500' => $item->disponible == 'SI',
                                ])>
                                    <span @class([
                                        'h-2 w-2 rounded-full',
                                        'bg-red-500' => $item->disponible == 'NO',
                                        'bg-green-500' => $item->disponible == 'SI',
                                    ])></span>
                                    {{ $item->disponible }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <ul class="flex flex-col gap-2">
                                    @foreach ($item->tags as $tag)
                                        <li>
                                            <span
                                                class="inline-flex items-center rounded bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800 border border-gray-200">
                                                <i class="fa-solid fa-tag mr-1 text-gray-400"></i>
                                                {{ $tag->nombre }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>

                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-start gap-4">
                                    <button title="Editar" class="text-blue-600 hover:text-blue-900 transition-colors">
                                        <i class="fa-solid fa-pen-to-square text-lg"></i>
                                    </button>
                                    <button title="Borrar" class="text-red-600 hover:text-red-900 transition-colors">
                                        <i class="fa-solid fa-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $cursos->links() }}
    @else
        <x-miscomponentes.advertencia>
            No se encontró ningún curso o aun no ha creado ninguno!!
        </x-miscomponentes.advertencia>
    @endif
</x-miscomponentes.base>
