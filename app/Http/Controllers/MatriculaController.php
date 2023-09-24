<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\DetalleMatricula;
use App\Models\Curso;
use App\Models\Seccion;
use App\Models\Grado;
use App\Models\Nivele;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    public function reporte_estudiante_matriculado(){
        $estudiantes_matriculados = DB::select("SELECT e.dni, e.nombre, e.apellido_paterno, e.apellido_materno,
        m.anio_academico, c.descripcion, n.grado, n.seccion
        FROM estudiantes AS e
        JOIN matriculas AS m
        ON m.estudiante_idestudiante = e.idestudiante
        JOIN detalle_matriculas AS dm
        ON dm.matriculas_idmatricula = m.idmatricula
        JOIN cursos AS c
        ON c.idcurso = dm.cursos_idcurso
        JOIN niveles AS n
        ON n.idnivel = c.niveles_idniveles
        ");

        return view('reporte.estudiantes_matriculados', compact('estudiantes_matriculados'));


    }

    public function index()
    {
        $datos['matriculass']  = DB::table('estudiantes')
            ->join('matriculas', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
            ->select('matriculas.idmatricula','estudiantes.*')
            ->get();
             
        return view('matricula.index', $datos);

    }

    public function create()
    {
    
        return view('matricula.create');
    }

    public function store(Request $request)
    {        
        /*
            IdEstudiante 16
            Grado 1
            Seccion C
            Especialidad NULL
        */       

        $datosForm = request()->except('_token');
        // dump($datosForm);

        // HECHO. Consular la tabla 'niveles' where grado = 1 y seccion = C para extraer el valor de 'idniveles' "3".
        $nivel = Nivele::where('grado', $datosForm['grado'])
            ->where('seccion', $datosForm['seccion'])->first();
        // dump($nivel->idnivel);

        // // Consultar la tabla 'cursos' where 'idniveles' "3" para extraer el array de cursos e insertarlo en 'detall_matricula'. 
        $cursos = DB::select('select * from cursos where niveles_idniveles = :id', ['id' => $nivel->idnivel]);
        // dump($cursos);        

        $estudiante = Estudiante::where('idestudiante', '=', $datosForm['idestudiante']);
        
        DB::table('matriculas')->insert(
            [
                'estudiante_idestudiante' => $datosForm['idestudiante'],
                'anio_academico' => $datosForm['anio_academico']
            ]
        );
        
        $matricula = Matricula::where('estudiante_idestudiante', $datosForm['idestudiante'])->first();
        // dump($matricula->idmatricula);
        // dump($matricula->estudiante_idestudiante);
        // dump($datosForm['idestudiante']);
            
        foreach($cursos as $curso){
            DB::table('detalle_matriculas')->insert(
                [
                    'matriculas_idmatricula' => $matricula->idmatricula, 
                    'cursos_idcurso' => $curso->idcurso
                ]
            );

        }
        
        return redirect('/matricula')->with('mensaje', 'Matricula agregado con exito');

    }
 
    public function show($id)
    {
        //
        // dump($id);
        $datos['reportematricula']  = DB::table('estudiantes')
        ->join('matriculas', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
        ->join('detalle_matriculas', 'matriculas.idmatricula', '=', 'detalle_matriculas.matriculas_idmatricula')
        ->join('cursos', 'cursos.idcurso', '=', 'detalle_matriculas.cursos_idcurso')
        ->join('niveles', 'niveles.idnivel', '=', 'cursos.niveles_idniveles')
            ->select('matriculas.*','estudiantes.*','detalle_matriculas.*','cursos.*', 'niveles.*')
            ->where('detalle_matriculas.matriculas_idmatricula', '=', $id)
            ->get();
        
        // dump($datos);    

        
        return view('matricula.show', $datos);
    }
 
    public function edit($id)
    {
        //
        $datos['reportematricula']  = DB::table('estudiantes')
        ->join('matriculas', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
        ->join('detalle_matriculas', 'matriculas.idmatricula', '=', 'detalle_matriculas.matriculas_idmatricula')
        ->join('cursos', 'cursos.idcurso', '=', 'detalle_matriculas.cursos_idcurso')
        ->join('niveles', 'niveles.idnivel', '=', 'cursos.niveles_idniveles')
            ->select('matriculas.*','estudiantes.*','detalle_matriculas.*','cursos.*', 'niveles.*')
            ->where('detalle_matriculas.matriculas_idmatricula', '=', $id)
            ->get();

        // dump($datos);
        return view('matricula.edit', $datos);
        
    }

    public function update(Request $request)
    {
        $datosForm = request()->except('_token', '_method');
        // dump($datosForm);

        // HECHO. Consular la tabla 'niveles' where grado = 1 y seccion = C para extraer el valor de 'idniveles' "3".
        $nivel = Nivele::where('grado', $datosForm['grado'])
            ->where('seccion', $datosForm['seccion'])->first();
        
        $cursos = DB::select('select * from cursos where niveles_idniveles = :id', ['id' => $nivel->idnivel]);

        // dump($cursos);
        
        // //buscar por id 
        $estudiante = Estudiante::where('idestudiante', '=', $datosForm['idestudiante']);
 

        DB::delete('delete from detalle_matriculas where matriculas_idmatricula = ?',[$datosForm['idmatricula']]);

        foreach($cursos as $curso){
            DB::table('detalle_matriculas')->insert(
                [
                    'matriculas_idmatricula' => $datosForm['idmatricula'], 
                    'cursos_idcurso' => $curso->idcurso
                ]
            );

        } 
        
        return $this->index();

        
    }

    public function destroy($id)
    { 
        DB::delete('delete from detalle_matriculas where matriculas_idmatricula = ?', [$id]);
        DB::delete('delete from matriculas where idmatricula = ?', [$id]);
        return $this->index();
    }
}
