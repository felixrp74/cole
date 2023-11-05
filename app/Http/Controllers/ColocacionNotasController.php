<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColocacionNotasController extends Controller
{
    //
    public function index()
    {
        $id = auth()->user()->identificador_docente;

        if(is_null($id))
            $id = 99999;

        $data = DB::select("SELECT 
                asignaciones.idasignacion,
                docentes.nombre AS nombreDocente,
                docentes.iddocente,
                cursos.*,
                detalle_matriculas.*,
                estudiantes.*,
                niveles.*,
                matriculas.*
            FROM docentes
            JOIN asignaciones ON asignaciones.docentes_iddocente = docentes.iddocente
            JOIN detalle_asignaciones ON detalle_asignaciones.asignaciones_idasignacion = asignaciones.idasignacion
            JOIN cursos ON cursos.idcurso = detalle_asignaciones.cursos_idcurso
            JOIN niveles ON niveles.idnivel = cursos.niveles_idniveles
            JOIN detalle_matriculas ON detalle_matriculas.cursos_idcurso = cursos.idcurso
            JOIN matriculas ON matriculas.idmatricula = detalle_matriculas.matriculas_idmatricula
            JOIN estudiantes ON estudiantes.idestudiante = matriculas.estudiante_idestudiante
            WHERE docentes.iddocente = $id
        ");

        $datos["colocacionnotass"] = $data;

            // dump($id);   
        // dump($datos);   
            
        return view('colocacionnotas.index', $datos);

    }

    function update(Request $request, $id)
    {
        $datosColocacion = request()->except('_token', '_method');

        $tamanoArray = sizeof($datosColocacion);
        $tamano = sizeof($datosColocacion)/8 ; // 9 elementos que se envian
        

        for ($i=1; $i <= $tamano  ; $i++) { 
            # code...

            $promedio = ($datosColocacion['nota1'.$i]+$datosColocacion['nota2'.$i]+$datosColocacion['nota3'.$i])/3;

            DB::table('detalle_matriculas')
            ->where('matriculas_idmatricula', $datosColocacion['idmatricula'.$i] )
            ->where('cursos_idcurso', $datosColocacion['idcurso'.$i] )
            ->update([
                    'nota1' => $datosColocacion['nota1'.$i],
                    'nota2' => $datosColocacion['nota2'.$i],
                    'nota3' => $datosColocacion['nota3'.$i],
                    'promedio' => $promedio
                ]);
        }
        
        return $this->index();
        
    }
}
