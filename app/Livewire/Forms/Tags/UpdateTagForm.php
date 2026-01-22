<?php

namespace App\Livewire\Forms\Tags;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Tag;

class UpdateTagForm extends Form
{
    public ?Tag $tag=null;
    public string $nombre="";
    
    #[Validate(['required', 'color'])]
    public string $color="#000000";

    public function rules(): array{
        return [
            'nombre'=>['required', 'string', 'min:3', 'max:60', 'unique:tags,nombre,'.$this->tag->id],
        ];
    }

    public function setTag(Tag $tag){
        $this->tag=$tag;
        $this->nombre=$tag->nombre;
        $this->color=$tag->color;
    }

    public function editForm(){
        $this->validate();
        $this->tag->update($this->all());
    }
    public function cancelarForm(){
        $this->reset('nombre', 'color');
        $this->resetValidation();
    }
}
