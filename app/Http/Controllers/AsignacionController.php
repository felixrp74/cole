<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\DetalleMatricula;
use App\Models\Curso;
use App\Models\Seccion;
use App\Models\Grado;
use App\Models\Nivele;
use App\Models\Asignacione;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    public function reporte_docente_asignado(){

        // var_dump("inteligentasdfsdfe");
        $docentes_asignados = DB::select("SELECT d.nombre, d.apellido_paterno,
        da.fecha_asignacion, c.descripcion, n.grado, n.seccion
        FROM docentes AS d
        JOIN asignaciones AS a
        ON a.docentes_iddocente = d.iddocente
        JOIN detalle_asignaciones AS da
        ON da.asignaciones_idasignacion = a.idasignacion
        JOIN cursos AS c
        ON c.idcurso = da.cursos_idcurso
        JOIN niveles AS n
        ON n.idnivel = c.niveles_idniveles
        ORDER BY  da.fecha_asignacion DESC
        ");

        return view('reporte.docentes_asignados', compact('docentes_asignados'));

    }


    public function index()
    {
        $datos['asignacioness']  = DB::table('docentes')
            ->join('asignaciones', 'docentes.iddocente', '=', 'asignaciones.docentes_iddocente')
            ->select('asignaciones.idasignacion','docentes.*')
            
            ->get(); 
            
        return view('asignacion.index', $datos);

    }

    public function create()
    {
        return view('asignacion.create');
    } 

    public function store(Request $request)
    {     

        //  DATA QUE VIENE DESDE 'asignacion.index' 
        $datosForm = request()->except('_token');
        // dump($datosForm);

        // HECHO. Consular la tabla 'niveles' where grado = 1 y seccion = C para extraer el valor de 'idniveles' "3".
        $nivel = Nivele::where('grado', $datosForm['grado'])
            ->where('seccion', $datosForm['seccion'])->first();
        // dump($nivel->idnivel);

        $cursos = Curso::where('niveles_idniveles', '=', $nivel->idnivel)->where('descripcion', '=', $datosForm['Curso'])->first();
        // dump($datosForm['Curso']);
        
        
        DB::table('asignaciones')->insert(
            ['docentes_iddocente' => $datosForm['IdDocente']]
        );
        
                
        $asignacion = Asignacione::where('docentes_iddocente', $datosForm['IdDocente'])->first();
        // dump($asignacion->idasignacion);
        // dump($asignacion->docentes_iddocente);

        DB::table('detalle_asignaciones')->insert(
            [
                'asignaciones_idasignacion' => $asignacion->idasignacion, 'cursos_idcurso' => $cursos->idcurso
            ]
        );

        return redirect('/asignacion')->with('mensaje', 'Asignacion agregado con exito');
    }
 
    public function show($id)
    { 
        $datos['asignacioness']  = DB::table('docentes')
            ->join('asignaciones', 'asignaciones.docentes_iddocente', '=', 'docentes.iddocente') 
            ->join('detalle_asignaciones', 'detalle_asignaciones.asignaciones_idasignacion', '=', 'asignaciones.idasignacion')
            ->join('cursos', 'cursos.idcurso', '=', 'detalle_asignaciones.cursos_idcurso')
            ->join('niveles', 'niveles.idnivel', '=', 'cursos.niveles_idniveles')
            ->join('detalle_matriculas', 'detalle_matriculas.cursos_idcurso', '=', 'cursos.idcurso')
            ->join('matriculas', 'matriculas.idmatricula', '=', 'detalle_matriculas.matriculas_idmatricula')
            ->join('estudiantes', 'estudiantes.idestudiante', '=', 'matriculas.estudiante_idestudiante')
            ->where('asignaciones.idasignacion', '=', 17)
            ->select(
            'docentes.nombre AS nombreDocente', 
            'docentes.apellido_paterno AS paternoDocente',
            'docentes.apellido_materno AS maternoDocente', 
            'docentes.profesion AS profesionDocente', 
            'cursos.*', 
            'niveles.*',
            'estudiantes.*',
            'detalle_matriculas.*', 
            'matriculas.*'
            )
            ->get();
            
        if(isset($datos['asignacioness']))
        { 
            // echo 'si entro';
            $datos['asignacioness']  = DB::table('docentes')
            ->join('asignaciones', 'asignaciones.docentes_iddocente', '=', 'docentes.iddocente') 
            ->join('detalle_asignaciones', 'detalle_asignaciones.asignaciones_idasignacion', '=', 'asignaciones.idasignacion')
            ->join('cursos', 'cursos.idcurso', '=', 'detalle_asignaciones.cursos_idcurso')
            ->join('niveles', 'niveles.idnivel', '=', 'cursos.niveles_idniveles') 
            ->where('asignaciones.idasignacion', '=', $id)
            ->select(
            'docentes.nombre AS nombreDocente', 
            'docentes.apellido_paterno AS paternoDocente',
            'docentes.apellido_materno AS maternoDocente', 
            'docentes.profesion AS profesionDocente', 
            'cursos.*', 
            'niveles.*'
            )
            ->get();
             


        }    else{
            echo 'no entro';
        }      

        // dd($datos['asignacioness']);
  
        return view('asignacion.vercursos', $datos);
    }
 
    public function edit($id)
    { 
        //
        $datos['reporteasignacion']  = DB::table('docentes')
        ->join('asignaciones', 'asignaciones.docentes_iddocente', '=', 'docentes.iddocente')
        ->join('detalle_asignaciones', 'detalle_asignaciones.asignaciones_idasignacion', '=', 'asignaciones.idasignacion')
        ->join('cursos', 'cursos.idcurso', '=', 'detalle_asignaciones.cursos_idcurso')
        ->join('niveles', 'niveles.idnivel', '=', 'cursos.niveles_idniveles')
            ->select('docentes.*','asignaciones.*','detalle_asignaciones.*','cursos.*', 'niveles.*')
            ->where('detalle_asignaciones.asignaciones_idasignacion', '=', $id)
            ->get();

        // dump($datos);
        return view('asignacion.edit', $datos);
        
    }

    public function update(Request $request, $id)
    {
        $datosForm = request()->except('_token', '_method');
        // dump($datosForm);

        // HECHO. Consular la tabla 'niveles' where grado = 1 y seccion = C para extraer el valor de 'idniveles' "3".
        $nivel = Nivele::where('grado', $datosForm['grado'])
            ->where('seccion', $datosForm['seccion'])->first();
        

        $curso = Curso::where('niveles_idniveles', '=', $nivel->idnivel)->where('descripcion', '=', $datosForm['Curso'])->first();

        // dump($curso);
        
        // // //buscar por id 
        // $estudiante = Estudiante::where('iddocente', '=', $datosForm['iddocente']);
 

        DB::delete('delete from detalle_asignaciones where asignaciones_idasignacion = ?',[$datosForm['idasignacion']]);

        DB::table('detalle_asignaciones')->insert(
            [
                'asignaciones_idasignacion' => $datosForm['idasignacion'], 
                'cursos_idcurso' => $curso->idcurso
            ]
        );
        
        return $this->index();
    }

    public function destroy($id)
    {
        DB::delete('delete from detalle_asignaciones where asignaciones_idasignacion = ?', [$id]);
        DB::delete('delete from asignaciones where idasignacion = ?', [$id]);
        return $this->index();

    }

}
