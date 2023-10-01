<?php

namespace App\Http\Livewire\Apoderado;

use App\Models\Apoderado;
use Livewire\Component;
use Livewire\WithPagination;

class ApoderadoIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   
        $apoderados = Apoderado ::paginate(); 
 
        $apoderados = Apoderado::where('nombre_apoderado', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('apellido_paterno_apoderado', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('apellido_materno_apoderado', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('dni_apoderado', 'LIKE', '%'. $this->search .'%' ) 
                ->latest('created_at') 
                ->paginate();
 
        return view('livewire.apoderado.apoderado-index', compact('apoderados'));
    }
}
