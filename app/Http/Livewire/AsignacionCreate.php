<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Docente;

class AsignacionCreate extends Component
{

    public $search = '';

    public function render()
    {

        $docente = Docente::where('dni', '=', $this->search)
        ->get()->first();

        
        return view('livewire.asignacion-create', compact('docente'));
    }
}
