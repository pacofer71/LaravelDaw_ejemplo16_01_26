<?php

namespace App\Livewire\Forms\Tags;

use App\Models\Tag;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CrearTagForm extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:60', 'unique:tags,nombre'])]
    public string $nombre="";
    #[Validate(['required', 'color'])]
    public string $color="#000000";

    public function crearForm(){
        $this->validate();
        Tag::create($this->all());
    }
    public function cancelarForm(){
        $this->reset('nombre', 'color');
        $this->resetValidation();
    }
}
