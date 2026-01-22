<?php

namespace App\Livewire\Tags;

use App\Livewire\Forms\Tags\CrearTagForm;
use Livewire\Component;

class CrearTag extends Component
{
    public bool $openCrear=false;
    public CrearTagForm $cform;
    public function render()
    {
        return view('livewire.tags.crear-tag');
    }

    public function crearTag(){
        $this->cform->crearForm();
        $this->cancelar();
        $this->dispatch('evtTagCreado')->to(ShowTags::class);
        $this->dispatch('mensaje', 'Etiqueta Creada');
    }
    public function cancelar(){
        $this->openCrear=false;
        $this->cform->cancelarForm();
    }
}
