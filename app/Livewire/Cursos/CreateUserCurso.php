<?php

namespace App\Livewire\Cursos;

use App\Livewire\Forms\Cursos\CreateUserCursoForm;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUserCurso extends Component
{
    use WithFileUploads;

    public bool $openCrear=false;
    public CreateUserCursoForm $cform;
    public function render()
    {
        $categorias=Category::select('nombre', 'id')->orderBy('nombre')->get();
        $tags=Tag::select('nombre', 'id')->orderBy('nombre')->get();
        return view('livewire.cursos.create-user-curso', compact('tags', 'categorias'));
    }
    public function crearCurso(){
        $this->cform->crearCursoForm();
        $this->cancelar();
        $this->dispatch('mensaje', 'Curso Creado');
        $this->dispatch('evtCursoCreado')->to(ShowUserCursos::class);
    }
    public function cancelar(){
        $this->openCrear=false;
        $this->cform->cancelarForm();
    }
}
