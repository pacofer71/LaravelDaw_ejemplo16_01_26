<?php

namespace App\Livewire\Forms\Cursos;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Curso;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;


class UpdateUserCursoForm extends Form
{
    public ?Curso $curso=null;

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

    public function rules(): array{
        return [
            'nombre'=>['required', 'string', 'min:5', 'max:150', 'unique:cursos,nombre,'.$this->curso->id]
        ];
    }

    public function setCurso(Curso $curso){
        $this->curso=$curso;
        $this->nombre=$curso->nombre;
        $this->disponible=$curso->disponible;
        $this->category_id=$curso->category_id;
        $this->tags=$curso->tags()->pluck('tags.id')->toArray();
        $this->descripcion=$curso->descripcion;
    }
     public function updateCursoForm(){
        $datos=$this->validate();
        //$datos['imagen']=$this->imagen?->store('imagenes/cursos') ?? $this->curso->imagen;
        if($this->imagen){
            $datos['imagen']=$this->imagen->store('imagenes/cursos');
            if(basename($this->curso->imagen)!='default.jpg'){
                Storage::delete($this->curso->imagen);
            }
        }else{
            unset($datos['imagen']);
        }
        $this->curso->update($datos);
        $this->curso->tags()->sync($this->tags);

     }
     public function cancelarForm(){
        $this->resetValidation();
        $this->reset();
     }

    
}
