<?php

namespace App\Http\Livewire\Estudiante;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EstudianteIndex extends Component
{
    public function render()
    {
        $estudiantes = DB::table('estudiantes')
            ->select('estudiantes.*')
            ->get();

        return view('livewire.estudiante.estudiante-index', compact('estudiantes'));
    }
}
