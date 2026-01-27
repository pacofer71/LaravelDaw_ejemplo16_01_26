<x-miscomponentes.base>
    <div class="flex justify-between items-center mb-2">
        <x-input type="search" placeholder="Buscar..." wire:model.live="texto" />
        @livewire('cursos.create-user-curso')
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
                                <div class="cursor-pointer" wire:click="cambiarDisponible({{ $item->id }})">
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
                                </div>
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
                                    <button title="Editar" wire:click="editar({{ $item->id }})"
                                        class="text-blue-600 hover:text-blue-900 transition-colors">
                                        <i class="fa-solid fa-pen-to-square text-lg"></i>
                                    </button>
                                    <button title="Borrar" wire:click="mostrarConfirmacion({{ $item->id }})"
                                        class="text-red-600 hover:text-red-900 transition-colors">
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
    <!------------------------------ Modal para update --------------------------------------------- -->
    @if ($uform->curso)
        <x-dialog-modal maxWidth='4xl' wire:model='openUpdate'>
            <x-slot name="title">
                Editar Curso
            </x-slot>
            <x-slot name="content">
                <x-label value="Nombre" for="nombre" class="mb-1" />
                <x-input class="w-full mb-4" type="text" placeholder="Nombre..." id="nombre"
                    wire:model="uform.nombre" />
                <x-input-error for="uform.nombre" />

                <x-label value="Descripcion" for="descripcion" class="mb-1" />
                <textarea class="w-full rounded-lg mb-4" id="descripcion" wire:model="uform.descripcion"></textarea>
                <x-input-error for="uform.descripcion" />

                <x-label value="Categoria" for="categoria" class="mb-1" />
                <select id="categoria" class="w-full rounded-lg mb-4" wire:model="uform.category_id">
                    <option>Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error for="uform.category_id" />

                <x-label value="Disponible" for="disponible" class="mb-1" />
                <div class="flex items-center gap-6 mb-4">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="opcion" value="SI" wire:model="uform.disponible"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <span class="ml-2 text-sm font-medium text-gray-900">SÍ</span>
                    </label>

                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="opcion" value="NO" wire:model="uform.disponible"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <span class="ml-2 text-sm font-medium text-gray-900">NO</span>
                    </label>
                </div>
                <x-input-error for="uform.disponible" />

                <x-label value="Etiquetas" for="etiquetas" class="mb-1" />
                <div class="grid grid-cols-6 gap-4 mb-4">
                    @foreach ($tags as $tag)
                        <label for="{{ $tag->nombre }}"
                            class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50 transition-all">
                            <input type="checkbox" value="{{ $tag->id }}" wire:model="uform.tags"
                                id="{{ $tag->nombre }}"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <span class="ml-3 text-sm font-semibold text-gray-700">#{{ $tag->nombre }}</span>
                        </label>
                    @endforeach
                </div>
                <x-input-error for="uform.tags" />

                <x-label value="Imagen" for="imagen" class="mb-1" />
                <div class="w-full h-80 rounded bg-gray-200 relative">
                    <input type="file" class="hidden" id="uimagen" accept="image/*"
                        wire:model="uform.imagen" />
                    <label for="uimagen"
                        class="absolute bottom-2 right-2 text-white rounded-lg p-2 bg-gray-600 hover:bg-gray-800"
                        wire:loading.class="opacity-50 pointer-events-none cursor-not-allowed"
                        wire:target="uform.imagen">
                        <i class="fas fa-upload mr-1"></i>
                        <span wire:loading.remove wire:target="uform.imagen">IMAGEN</span>
                        <span wire:loading wire:target="uform.imagen">Cargando...</span>
                    </label>
                    @if ($uform->imagen)
                        <img src="{{ $uform->imagen->temporaryUrl() }}"
                            class="w-full h-full object-cover object-center bg-no-repeat" />
                    @else
                        <img src="{{ Storage::url($uform->curso->imagen) }}"
                            class="w-full h-full object-cover object-center bg-no-repeat" />
                    @endif
                </div>
                <x-input-error for="uform.imagen" />

            </x-slot>
            <x-slot name="footer">
                <div class="flex flex-row-reverse">
                    <x-button class="bg-blue-500 hover:bg-blue-700 text-white" wire:click="actualizarCurso"
                        wire:loading.attr="disabled">
                        <i class="fas fa-add mr-1"></i>EDITAR
                    </x-button>
                    <x-button class="bg-red-500 hover:bg-ted-700 text-white mr-2" wire:click="cancelar">
                        <i class="fas fa-xmark mr-1"></i>CANCELAR
                    </x-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    @endif

</x-miscomponentes.base>
