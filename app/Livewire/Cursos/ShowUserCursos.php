<?php

namespace App\Livewire\Cursos;

use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUserCursos extends Component
{
    use WithPagination;

    public string $campo="id";
    public string $orden="desc";
    public string $texto="";
    
    #[On('evtCursoCreado')]
    public function render()
    {
        $cursos=Curso::with('tags')
        ->select('cursos.*', 'categories.nombre as cnombre', 'categories.color')
        ->join('categories', 'categories.id', 'cursos.category_id')
        ->where('cursos.user_id', Auth::id())
        ->where(function($q){
            $q->where('cursos.nombre', 'like', "%{$this->texto}%")
            ->orWhere('categories.nombre', 'like', "%{$this->texto}%")
            ->orWhere('cursos.descripcion', 'like', "%{$this->texto}%")
            ->orWhere('cursos.disponible', 'like', "%{$this->texto}%")
            ->orWhereHas('tags', function($q){
                $q->where('nombre', 'like', "%{$this->texto}%");
            });
        })
        ->orderBy($this->campo, $this->orden)
        ->paginate(3);
        return view('livewire.cursos.show-user-cursos', compact('cursos'));
    }

    public function ordenar(string $campo){
        $this->orden=($this->orden=='asc') ? 'desc' : 'asc';
        $this->campo=$campo;
    }

    public function updatedTexto(){
        $this->resetPage();
    }
}
