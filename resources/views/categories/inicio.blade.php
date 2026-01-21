<x-layouts.app>
    <x-miscomponentes.base>
        <div class="mb-2 flex flex-row-reverse">
            <a href="{{ route('categories.create') }}"
                class="p-2 rounded-lg tesxt-white font-bold bg-green-500 hover:bg-green-700 text-white">
                <i class="fas fa-add mr-1"></i>NUEVA
            </a>
        </div>
        <!-- Tabla moderna -->
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg">
            <table class="w-full divide-y divide-gray-200">
                <!-- Cabecera -->
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 tracking-wide">
                            ID Categoría
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 tracking-wide">
                            Nombre Categoría
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 tracking-wide">
                            Color
                        </th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 tracking-wide">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody class="divide-y divide-gray-100">
                    @foreach ($categorias as $item)
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
                                <div class="flex justify-center space-x-2">
                                    <form method="POST" action="{{ route('categories.destroy', $item->id) }}">
                                      @csrf
                                      @method('DELETE')
                                        <a href="{{ route('categories.edit', $item->id) }}"
                                            class="inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors duration-200">
                                            <i class="fas fa-edit mr-1"></i>
                                            Editar
                                        </a>
                                        <button onclick="return confirm('¿Borrar Categoría?')"
                                            class="inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-200">
                                            <i class="fas fa-trash mr-1"></i>
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-miscomponentes.base>
</x-layouts.app>
