<?php

namespace App\Livewire\Tags;

use App\Livewire\Forms\Tags\UpdateTagForm;
use App\Models\Tag;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowTags extends Component
{
    public string $campo="id";
    public string $orden="desc";
    public string $buscar="";

    public bool $openEditar=false;

    public Tag $tag;

    public UpdateTagForm $uform;

    #[On('evtTagCreado')]
    public function render()
    {
        $tags=Tag::where('nombre', 'like', "%{$this->buscar}%")
        ->orderBy($this->campo, $this->orden)
        ->get();
        return view('livewire.tags.show-tags', compact('tags'));
    }

    public function ordenar(string $campo){
        $this->orden=($this->orden=='asc') ? 'desc' : 'asc';
        $this->campo=$campo;
    }
    //-- Metodos para borrar una etiqueta
    public function mostrarConfirmacion(Tag $tag){
        $this->tag=$tag;
        //dd($this->tag);
        $this->dispatch('evtBorrarTag', destino: 'tags.show-tags');
    }
    #[On('evtBorrarOk')]
    public function borrar(){
        $this->tag->delete();
        $this->dispatch('mensaje', 'Etiqueta Borrada');
    }
    //-- Metodo para editar
    public function edit(Tag $tag){
        $this->uform->setTag($tag);
        $this->openEditar=true;
    }
    public function updateTag(){
        $this->uform->editForm();
        $this->cancelar();
        $this->dispatch('mensaje', 'Etiqueta actualizada');
    }
    public function cancelar(){
        $this->openEditar=false;
        $this->uform->cancelarForm();
    }

}
