<?php

namespace App\Http\Livewire\Estudiante;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class EstudianteCreate extends Component
{

    public $vive = 'false';

    public function render()
    {
        // return view('livewire.matricula-create', compact('estudiante'));
        $roles = Role::all();        
        // dd($roles);
        return view('livewire.estudiante.estudiante-create', compact('roles'));
        // return view('livewire.estudiante.estudiante-create');
        
    }
}
