<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FichaMatriculaController extends Controller
{
    //
    public function index()
    {
        
        $id = auth()->user()->identificador_estudiante;
        // dd(auth()->user());
        $datos['matriculass']  = DB::table('estudiantes')
        ->join('matriculas', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
        ->select('matriculas.idmatricula','estudiantes.*')
        ->where('estudiantes.idestudiante', '=', $id)
        ->get();
         
        return view('fichamatricula.index', $datos);


    }
}
