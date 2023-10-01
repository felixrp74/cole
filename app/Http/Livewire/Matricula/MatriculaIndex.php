<?php

namespace App\Http\Livewire\Matricula;

use App\Models\Matricula;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class MatriculaIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   
        $matriculass = Matricula::paginate(); 
 
        $matriculass = DB::table('estudiantes')
        ->join('matriculas', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
        ->select('matriculas.idmatricula','estudiantes.*')
        ->where('estudiantes.nombre', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('estudiantes.apellido_paterno', 'LIKE', '%'. $this->search .'%' ) 
        ->orWhere('estudiantes.apellido_materno', 'LIKE', '%'. $this->search .'%' ) 
        //->orWhere('dni', 'LIKE', '%'. $this->search .'%' ) 
                ->latest('created_at') 
                ->paginate();
 
        return view('livewire.matricula.matricula-index', compact('matriculass'));
        // return view('livewire.matricula.matricula-index');
    }
}
