<x-layouts.app>
    <x-miscomponentes.base>
           
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
          <tr class="hover:bg-gray-50 transition-colors duration-200">
            <td class="px-6 py-5 text-sm font-medium text-gray-900">
              #001
            </td>
            <td class="px-6 py-5 text-sm text-gray-800 font-medium">
              Electrónica
            </td>
            <td class="px-6 py-5">
              <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-lg shadow-md flex items-center justify-center text-xs font-mono font-bold bg-[#3B82F6]">
                  <span class="text-white">#3B82F6</span>
                </div>
              </div>
            </td>
            <td class="px-6 py-5 text-center">
              <div class="flex justify-center space-x-2">
                <button class="inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors duration-200">
                  <i class="fas fa-edit mr-1"></i>
                  Editar
                </button>
                <button class="inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-200">
                  <i class="fas fa-trash mr-1"></i>
                  Eliminar
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    </x-miscomponentes.base>
</x-layouts.app>
