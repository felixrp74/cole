<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;

class MatriculaIndex extends Component
{

    public $search = '';


    public function render()
    {

        $estudiante = Estudiante::where('idestudiante', '=', $this->search)
                ->get()->first();

        return view('livewire.matricula-index', compact('estudiante') );
    }
}
