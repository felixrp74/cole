<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;

class MatriculaCreate extends Component
{

    public $search = '';

    public function render()
    {
        $estudiante = Estudiante::where('dni', '=', $this->search)
                ->get()->first();


        return view('livewire.matricula-create', compact('estudiante'));
    }
}
