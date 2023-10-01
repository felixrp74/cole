<?php

namespace App\Http\Livewire\Docente;

use App\Models\Docente;
use Livewire\Component;
use Livewire\WithPagination;

class DocenteIndex extends Component
{ 
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $docentes = Docente::paginate(); 
 
        $docentes = Docente::where('nombre', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('apellido_paterno', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('apellido_materno', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('dni', 'LIKE', '%'. $this->search .'%' ) 
        ->latest('created_at') 
        ->paginate();
 
        return view('livewire..docente.docente-index', compact('docentes'));
    }
}
