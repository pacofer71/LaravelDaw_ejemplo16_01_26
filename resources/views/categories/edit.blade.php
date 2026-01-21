<x-layouts.app>
    <x-miscomponentes.base>
        <div class="p-4 w-1/2 mx-auto border-2 border-gray-400 rounded shadow-xl">
            <form method="POST" action="{{ route('categories.update', $category) }}">
                @csrf
                @method('PUT')
                <x-label value="Nombre" />
                <x-input type="text" class="w-full" value="{{ @old('nombre', $category->nombre) }}" name="nombre" />
                <x-input-error for="nombre" />
                <x-label value="Color" class="mt-4" />
                <x-input type="color" class="w-full" value="{{ @old('color', $category->color) }}" name="color" />
                <x-input-error for="color" />

                <div class="flex mt-4 flex-row-reverse w-full">
                    <button type="submit"
                    class="p-2 rounded-lg font-bold bg-green-500 hover:bg-green-700 text-white">
                    <i class="fas fa-edit mr-1"></i>EDITAR
                    </button>

                    <a href="{{ route('categories.index') }}"
                        class="mr-2 p-2 rounded-lg font-bold bg-red-500 hover:bg-red-700 text-white">
                        <i class="fas fa-xmark mt-1"></i>CANCELAR
                    </a>

                </div>
            </form>
        </div>
    </x-miscomponentes.base>
</x-layouts.app>
