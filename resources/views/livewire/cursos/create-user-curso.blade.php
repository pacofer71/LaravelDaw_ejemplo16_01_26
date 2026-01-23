<div>
    <button class="p-2 rounded-xl text-white bg-green-500 hover:bg-green-700" wire:click="$set('openCrear', true)">
        <i class="fas fa-add mr-1"></i>NUEVO
    </button>
    <x-dialog-modal maxWidth='4xl' wire:model='openCrear'>
        <x-slot name="title">
            Nuevo Curso
        </x-slot>
        <x-slot name="content">
            <x-label value="Nombre" for="nombre" class="mb-1" />
            <x-input class="w-full mb-4" type="text" placeholder="Nombre..." id="nombre"
                wire:model="cform.nombre" />
            <x-input-error for="cform.nombre" />

            <x-label value="Descripcion" for="descripcion" class="mb-1" />
            <textarea class="w-full rounded-lg mb-4" id="descripcion" wire:model="cform.descripcion"></textarea>
            <x-input-error for="cform.descripcion" />

            <x-label value="Categoria" for="categoria" class="mb-1" />
            <select id="categoria" class="w-full rounded-lg mb-4" wire:model="cform.category_id">
                <option>Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            <x-input-error for="cform.category_id" />

            <x-label value="Disponible" for="disponible" class="mb-1" />
            <div class="flex items-center gap-6 mb-4">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="radio" name="opcion" value="SI" wire:model="cform.disponible"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                    <span class="ml-2 text-sm font-medium text-gray-900">SÍ</span>
                </label>

                <label class="inline-flex items-center cursor-pointer">
                    <input type="radio" name="opcion" value="NO" wire:model="cform.disponible"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                    <span class="ml-2 text-sm font-medium text-gray-900">NO</span>
                </label>
            </div>
            <x-input-error for="cform.disponible" />

            <x-label value="Etiquetas" for="etiquetas" class="mb-1" />
            <div class="grid grid-cols-6 gap-4 mb-4">
                @foreach ($tags as $tag)
                    <label for="{{ $tag->nombre }}"
                        class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50 transition-all">
                        <input type="checkbox" value="{{ $tag->id }}" wire:model="cform.tags"
                            id="{{ $tag->nombre }}"
                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <span class="ml-3 text-sm font-semibold text-gray-700">#{{ $tag->nombre }}</span>
                    </label>
                @endforeach
            </div>
            <x-input-error for="cform.tags" />

            <x-label value="Imagen" for="imagen" class="mb-1" />
            <div class="w-full h-80 rounded bg-gray-200 relative">
                <input type="file" class="hidden" id="cimagen" accept="image/*" wire:model="cform.imagen" />
                <label for="cimagen"
                    class="absolute bottom-2 right-2 text-white rounded-lg p-2 bg-gray-600 hover:bg-gray-800"
                    wire:loading.class="opacity-50 pointer-events-none cursor-not-allowed" wire:target="cform.imagen">
                    <i class="fas fa-upload mr-1"></i>
                    <span wire:loading.remove wire:target="cform.imagen">IMAGEN</span>
                    <span wire:loading wire:target="cform.imagen">Cargando...</span>
                </label>
                @if ($cform->imagen)
                    <img src="{{ $cform->imagen->temporaryUrl() }}"
                        class="w-full h-full object-cover object-center bg-no-repeat" />
                @endif
            </div>
            <x-input-error for="cform.imagen" />

        </x-slot>
        <x-slot name="footer">
            <div class="flex flex-row-reverse">
                <x-button class="bg-blue-500 hover:bg-blue-700 text-white" wire:click="crearCurso"
                    wire:loading.attr="disabled">
                    <i class="fas fa-add mr-1"></i>CREAR
                </x-button>
                <x-button class="bg-red-500 hover:bg-ted-700 text-white mr-2" wire:click="cancelar">
                    <i class="fas fa-xmark mr-1"></i>CANCELAR
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
