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
                                 Botones
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
 </x-miscomponentes.base>
