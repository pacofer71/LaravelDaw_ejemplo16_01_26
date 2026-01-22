<div>
    <button class="p-2 rounded-lg text-white font-bold bg-green-500 hover:bg-green-700" 
    wire:click="$set('openCrear', true)">
        <i class="fas fa-add mr-1"></i>NUEVA
    </button>
    <x-dialog-modal wire:model="openCrear">
        <x-slot name="title">
            Nueva Etiqueta
        </x-slot>
        <x-slot name="content">
            <x-label for='nombre' value="Nombre" class="mb-1" />
            <x-input id="nombre" type="text" class="w-full" wire:model="cform.nombre" />
            <x-input-error for="cform.nombre" />
            <x-label for='color' value="Color" class="mb-1 mt-4" />
            <x-input id="color" type="color" class="w-full" wire:model="cform.color" />
            <x-input-error for="cform.color" />
        </x-slot>
        <x-slot name="footer">
            <div class="flex flex-row-reverse">
                <x-button class="bg-blue-500 hover:bg-blue-700 text-white" wire:click="crearTag">
                    <i class="fas fa-add mr-1"></i>CREAR
                </x-button>
                <x-button class="bg-red-500 hover:bg-ted-700 text-white mr-2" wire:click="cancelar">
                    <i class="fas fa-xmark mr-1"></i>CANCELAR
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
