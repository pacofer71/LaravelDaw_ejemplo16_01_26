<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;

class ShowTags extends Component
{
    public string $campo="id";
    public string $orden="desc";
    public string $buscar="";

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
}
