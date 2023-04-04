<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\Apoderado;
use App\Models\Curso;

class HomeController extends Controller
{
    public function index(){

        $estudiantes = Estudiante::all();
        $docentes = Docente::all();
        $cursos = Docente::all();
        $apoderados = Apoderado::all();
        $cursos = Curso::all();
        
        return view('admin.index', compact('estudiantes', 'docentes', 'apoderados', 'cursos'));
    }
    
}