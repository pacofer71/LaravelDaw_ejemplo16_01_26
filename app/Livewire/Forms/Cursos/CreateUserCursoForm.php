<?php

namespace App\Livewire\Forms\Cursos;

use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class CreateUserCursoForm extends Form
{
    #[Validate(['required', 'string', 'min:5', 'max:150', 'unique:cursos,nombre'])]
    public string $nombre="";
    
    #[Validate(['required', 'string', 'min:10', 'max:500'])]
    public string $descripcion="";
    
    #[Validate(['required', 'in:SI,NO'])]
    public string $disponible="";

    #[Validate(['required', 'exists:categories,id'])]
    public int $category_id=0;

    #[Validate(['nullable', 'image', 'max:2048'])]
    public ?TemporaryUploadedFile $imagen=null;

    #[Validate(['required', 'array', 'exists:tags,id'])]
    public array $tags=[];

    public function crearCursoForm(){
        $datos=$this->validate();
        $datos['user_id']=Auth::id();
        $datos['imagen']=$this->imagen?->store('imagenes/cursos') ?? 'imagenes/cursos/default.jpg';
        $curso=Curso::create($datos);
        $curso->tags()->attach($this->tags);

    }
    public function cancelarForm(){
        $this->resetValidation();
        $this->reset();

    }


}
