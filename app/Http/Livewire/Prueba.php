<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Estudiante;
use Livewire\WithPagination;

class Prueba extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    // public $selectedId = null; //cambiaremos por DNI
    // public $elegidos = null; //obtencion del unico estudiante para autocompletar en el formulario
    public $search = '';

    public function render()
    {
        // https://stackoverflow.com/questions/74217805/passing-multiple-variable-using-compact-in-laravel
        
        $estudiante = Estudiante::where('idestudiante', '=', $this->search)
                ->get()->first();

        return view('livewire.prueba', compact('estudiante') );
    }

    // public function updatedselectedId($selectedId)
    // {
    //     // $this->elegido = Estudiante::where('idestudiante', $selectedId)->get()->first();
    //     dump($selectedId);
    //     $this->elegidos = Estudiante::where('idestudiante',$selectedId)->get()->first();
    //      dump($this->elegidos);
    // }

}
