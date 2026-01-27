<?php

namespace App\Livewire\Cursos;

use App\Livewire\Forms\Cursos\UpdateUserCursoForm;
use App\Models\Category;
use App\Models\Curso;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowUserCursos extends Component
{
    use WithFileUploads;
    use WithPagination;

    public string $campo = 'id';

    public string $orden = 'desc';

    public string $texto = '';

    public ?Curso $curso = null;

    public UpdateUserCursoForm $uform;

    public bool $openUpdate = false;

    #[On('evtCursoCreado')]
    public function render()
    {
        $cursos = Curso::with('tags')
            ->select('cursos.*', 'categories.nombre as cnombre', 'categories.color')
            ->join('categories', 'categories.id', 'cursos.category_id')
            ->where('cursos.user_id', Auth::id())
            ->where(function ($q) {
                $q->where('cursos.nombre', 'like', "%{$this->texto}%")
                    ->orWhere('categories.nombre', 'like', "%{$this->texto}%")
                    ->orWhere('cursos.descripcion', 'like', "%{$this->texto}%")
                    ->orWhere('cursos.disponible', 'like', "%{$this->texto}%")
                    ->orWhereHas('tags', function ($q) {
                        $q->where('nombre', 'like', "%{$this->texto}%");
                    });
            })
            ->orderBy($this->campo, $this->orden)
            ->paginate(3);
        $tags = Tag::select('id', 'nombre')->orderBy('nombre')->get();
        $categorias = Category::select('id', 'nombre')->orderBy('nombre')->get();

        return view('livewire.cursos.show-user-cursos', compact('cursos', 'tags', 'categorias'));
    }

    public function ordenar(string $campo)
    {
        $this->orden = ($this->orden == 'asc') ? 'desc' : 'asc';
        $this->campo = $campo;
    }

    public function updatedTexto()
    {
        $this->resetPage();
    }

    // ---------------- Borrar Curso ----------------------------------------------
    public function mostrarConfirmacion(Curso $curso)
    {
        $this->authorize('delete', $curso);
        $this->curso = $curso;
        $this->dispatch('evtBorrarCurso', destino: 'cursos.show-user-cursos');
    }

    #[On('evtBorrarOk')]
    public function borrar()
    {
        $imagenVieja = $this->curso->imagen;
        $this->curso->delete();
        if (basename($imagenVieja) != 'default.jpg') {
            Storage::delete($imagenVieja);
        }
        $this->dispatch('mensaje', 'Se ha borrado el curso');
        $this->reset('curso');
    }

    // --------------------------- EDITAR CURSO ----------------------
    public function editar(Curso $curso)
    {
        $this->authorize('update', $curso);
        $this->uform->setCurso($curso);
        $this->openUpdate = true;
    }

    public function actualizarCurso()
    {
        $this->uform->updateCursoForm();
        $this->cancelar();
        $this->dispatch('mensaje', 'Se ha actualizado el curso');
    }

    public function cancelar()
    {
        $this->openUpdate = false;
        $this->uform->cancelarForm();
    }

    // ------------------ Metodo para campbiar disponible
    public function cambiarDisponible(Curso $curso)
    {
        $this->authorize('update', $curso);
        $disponible = $curso->disponible === 'SI' ? 'NO' : 'SI';
        $curso->update([
            'disponible' => $disponible,
        ]);
        //$curso->update(compact('disponible'));
        $this->dispatch('mensaje', 'Se cambió la disponibilidad del curso');

    }
}
