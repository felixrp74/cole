<?php

namespace App\Http\Livewire\Docente;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Colocacionnotas extends Component
{
    public function render()
    {
        //$users = User::paginate();
        // return view('livewire.admin.users-index');

        // filtrar publicaciones por id
        // $users = Post::where('user_id', auth()->user()->id)
        /*
        $colocacionnotass = User::where('name', 'LIKE', '%'. $this->search .'%')
                ->orWhere('email', 'LIKE', '%'. $this->search .'%')
                ->orWhere('escuela', 'LIKE', '%'. $this->search .'%')
                ->latest('created_at') 
                ->paginate();
        */

        $colocacionnotass  = DB::table('docentes')
        ->join('asignaciones', 'asignaciones.docentes_iddocente', '=', 'docentes.iddocente')
        ->join('detalle_asignaciones', 'detalle_asignaciones.asignaciones_idasignacion', '=', 'asignaciones.docentes_iddocente')
        ->join('cursos', 'cursos.idcurso', '=', 'detalle_asignaciones.cursos_idcurso')
        ->join('niveles', 'niveles.idnivel', '=', 'cursos.niveles_idnivel')
        ->join('detalle_matriculas', 'detalle_matriculas.cursos_idcurso', '=', 'cursos.idcurso')
        ->join('matriculas', 'matriculas.idmatricula', '=', 'detalle_matriculas.matriculas_idmatricula')
        ->join('estudiantes', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
            ->where('iddocente', 1)
            ->select('asignaciones.idasignacion','docentes.nombre AS nombreDocente', 'docentes.iddocente', 'cursos.*','detalle_matriculas.*', 
            'estudiantes.*', 'niveles.*', 'matriculas.*')
            ->get();

        return view('livewire.docente.colocacionnotas', compact('colocacionnotass'));
    }
}
