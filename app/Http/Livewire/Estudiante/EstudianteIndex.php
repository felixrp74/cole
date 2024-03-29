<?php

namespace App\Http\Livewire\Estudiante;

use App\Models\Estudiante;
use Livewire\Component; 
use Livewire\WithPagination;

class EstudianteIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   

        $estudiantes = Estudiante::paginate(); 
 
        $estudiantes = Estudiante::where('nombre', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('apellido_paterno', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('apellido_materno', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('dni', 'LIKE', '%'. $this->search .'%' ) 
                ->latest('created_at') 
                ->paginate();
 
        return view('livewire.estudiante.estudiante-index', compact('estudiantes'));
    }
}
