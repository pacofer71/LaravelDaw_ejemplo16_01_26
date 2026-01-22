 <x-miscomponentes.base>
     <!-- Tabla moderna -->
     <div class="flex justify-between items-center mb-2">
         <x-input type="search" placeholder="Buscar..." wire:model.live="buscar" />
         @livewire('tags.crear-tag')
     </div>
     @if ($tags->count())
         <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg">
             <table class="w-full divide-y divide-gray-200">
                 <!-- Cabecera -->
                 <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                     <tr>
                         <th wire:click="ordenar('id')"
                             class="px-6 py-4 text-left text-sm font-semibold text-gray-700 tracking-wide cursor-pointer">
                             <i class="fas fa-sort mr-1"></i>ID Tag
                         </th>
                         <th wire:click="ordenar('nombre')"
                             class="px-6 py-4 text-left text-sm font-semibold text-gray-700 tracking-wide cursor-pointer">
                             <i class="fas fa-sort mr-1"></i>Nombre Tag
                         </th>
                         <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 tracking-wide">
                             Color Tag
                         </th>
                         <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 tracking-wide">
                             Acciones
                         </th>
                     </tr>
                 </thead>

                 <!-- Cuerpo de la tabla -->
                 <tbody class="divide-y divide-gray-100">
                     @foreach ($tags as $item)
                         <tr class="hover:bg-gray-50 transition-colors duration-200">
                             <td class="px-6 py-5 text-sm font-medium text-gray-900">
                                 {{ $item->id }}
                             </td>
                             <td class="px-6 py-5 text-sm text-gray-800 font-medium">
                                 {{ $item->nombre }}
                             </td>
                             <td class="px-6 py-5">
                                 <div class="flex items-center space-x-3">
                                     <div class="w-24 h-10 rounded-lg shadow-md flex items-center justify-center font-mono font-bold"
                                         style="background-color:{{ $item->color }}">
                                         <span class="text-white">{{ $item->color }}</span>
                                     </div>
                                 </div>
                             </td>
                             <td class="px-6 py-5 text-center">
                                <button wire:click="edit({{ $item->id }})">
                                     <i class="fas fa-edit"></i>
                                 </button>
                                 <button wire:click="mostrarConfirmacion({{ $item->id }})">
                                     <i class="fas fa-trash"></i>
                                 </button>
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
     @else
         <x-miscomponentes.advertencia>
             No se encontró ningúna etiqueta o aun no ha creado ninguna!!
         </x-miscomponentes.advertencia>
     @endif
     <!-- ------------------------------- Modal para editar ----------------------------- -->
     @isset($uform->tag)
      <x-dialog-modal wire:model="openEditar">
        <x-slot name="title">
            Editar Etiqueta
        </x-slot>
        <x-slot name="content">
            <x-label for='nombre' value="Nombre" class="mb-1" />
            <x-input id="nombre" type="text" class="w-full" wire:model="uform.nombre" />
            <x-input-error for="uform.nombre" />
            <x-label for='color' value="Color" class="mb-1 mt-4" />
            <x-input id="color" type="color" class="w-full" wire:model="uform.color" />
            <x-input-error for="uform.color" />
        </x-slot>
        <x-slot name="footer">
            <div class="flex flex-row-reverse">
                <x-button class="bg-blue-500 hover:bg-blue-700 text-white" wire:click="updateTag">
                    <i class="fas fa-save mr-1"></i>EDITAR
                </x-button>
                <x-button class="bg-red-500 hover:bg-ted-700 text-white mr-2" wire:click="cancelar">
                    <i class="fas fa-xmark mr-1"></i>CANCELAR
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
    @endisset
 </x-miscomponentes.base>
