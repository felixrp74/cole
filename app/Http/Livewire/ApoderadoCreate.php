<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;

class ApoderadoCreate extends Component
{
       
    
    public $search = '';
    public $vive = 'true'; 

    public function render()
    {
        $estudiante = Estudiante::where('dni', '=', $this->search)
                ->get()->first();


        return view('livewire.apoderado-create', compact('estudiante'));
        // return view('livewire.apoderado-create');
    }
}
