<?php

namespace App\Http\Livewire\Asignacion;

use App\Models\Asignacione;
use App\Models\Docente;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AsignacionIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   

        $asignacioness = Asignacione::paginate(); 
        Docente::all();
 
        $asignacioness = DB::table('docentes')
        ->join('asignaciones', 'docentes.iddocente', '=', 'asignaciones.docentes_iddocente')
        ->select('asignaciones.idasignacion','docentes.*')
        ->where('docentes.nombre', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('docentes.apellido_paterno', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('docentes.apellido_materno', 'LIKE', '%'. $this->search .'%' ) 
        //->orWhere('dni', 'LIKE', '%'. $this->search .'%' ) 
                ->latest('created_at') 
                ->paginate();
 
        return view('livewire.asignacion.asignacion-index', compact('asignacioness'));
    } 
}
