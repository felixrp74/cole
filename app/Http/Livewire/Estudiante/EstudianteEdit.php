<?php

namespace App\Http\Livewire\Estudiante;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EstudianteEdit extends Component
{
    public function render()
    {
        $estudiante = DB::table('estudiantes')
            ->select('estudiantes.*')
            ->where('idestudiante',$idestudiante)
            ->first();

        // return view('estudiante.edit', compact('estudiante'));

        return view('livewire.estudiante.estudiante-edit', compact('estudiante'));
    }

    public function editEstudiante($id){  

        echo '99';
     
        // try {
        //     $post = Posts::findOrFail($id);
        //     if( !$post) {
        //         session()->flash('error','Post not found');
        //     } else {
        //         $this->title = $post->title;
        //         $this->description = $post->description;
        //         $this->postId = $post->id;
        //         $this->updatePost = true;
        //         $this->addPost = false;
        //     }
        // } catch (\Exception $ex) {
        //     session()->flash('error','Something goes wrong!!');
        // }
 
    }
}
