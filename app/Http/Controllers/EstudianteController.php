<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Apoderado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class EstudianteController
 * @package App\Http\Controllers
 */

class EstudianteController extends Controller
{
    public function index()
    {
        $datos['estudiantes'] = Estudiante::all();
        return view('estudiante.index', $datos);
    }

    public function create()
    {
        return view('estudiante.create'); 
    }

    public function store(Request $request)
    {        
        $datosEstudianteApoderado = request()->except('_token');

        // if( $request->hasFile('Foto') ){
        //     $datosEstudiante['Foto'] = $request->file('Foto')->store('uploads','public');
        // }
        // echo gettype($datosEstudiante), "\n";
        
        // array('Taylor', 'Dayle');
        // dump($array);

        $datosEstudiante = array(
            "dni" => $datosEstudianteApoderado["dni"],
            "nombre" => $datosEstudianteApoderado["nombre"],
            "apellido_paterno" => $datosEstudianteApoderado["apellido_paterno"],
            "apellido_materno" => $datosEstudianteApoderado["apellido_materno"],
            "fecha_nacimiento" => $datosEstudianteApoderado["fecha_nacimiento"],
            "lugar_nacimiento" => $datosEstudianteApoderado["lugar_nacimiento"],
            "genero" => $datosEstudianteApoderado["genero"],
            "direccion_actual" => $datosEstudianteApoderado["direccion_actual"],
            "celular" => $datosEstudianteApoderado["celular"],
            "email" => $datosEstudianteApoderado["email"],
            "password" => $datosEstudianteApoderado["password"]
        );


        


        // dump($datosEstudiante);
        //Estudiante::insert($datosEstudiante);

        $estudiante = Estudiante::orderBy('idestudiante', 'desc')->first();
        // echo ($estudiante["dni"]);

        $datosApoderado = array(
            "genero_apoderado" => $datosEstudianteApoderado["genero_apoderado"],
            "dni_apoderado" => $datosEstudianteApoderado["dni_apoderado"],
            "nombre_apoderado" => $datosEstudianteApoderado["nombre_apoderado"],
            "apellido_paterno_apoderado" => $datosEstudianteApoderado["apellido_paterno_apoderado"],
            "apellido_materno_apoderado" => $datosEstudianteApoderado["apellido_materno_apoderado"],
            "fecha_nacimiento_apoderado" => $datosEstudianteApoderado["fecha_nacimiento_apoderado"],
            "lugar_nacimiento_apoderado" => $datosEstudianteApoderado["lugar_nacimiento_apoderado"],
            "vive_apoderado" => $datosEstudianteApoderado["vive_apoderado"],
            "direccion_actual_apoderado" => $datosEstudianteApoderado["direccion_actual_apoderado"],
            "email_apoderado" => $datosEstudianteApoderado["email_apoderado"],
            "grado_instruccion_apoderado" => $datosEstudianteApoderado["grado_instruccion_apoderado"],
            "ocupacion_apoderado" => $datosEstudianteApoderado["ocupacion_apoderado"],
            "estado_civil_apoderado" => $datosEstudianteApoderado["estado_civil_apoderado"],
            "celular_apoderado" => $datosEstudianteApoderado["celular_apoderado"],
            "estudiantes_idestudiante" => $estudiante["idestudiante"]
        );
        // dd($datosApoderado);
        Apoderado::insert($datosApoderado);

        return redirect('/estudiante')->with('mensaje', 'Empleado agregado con exito');
    }
 
    public function show($id)
    {
        //
        $estudiante = DB::table('estudiantes')
            ->select('estudiantes.*')
            ->where('idestudiante',$id)
            ->first();

        return $estudiante;
    }
 
    public function edit($idestudiante)
    {
        //
        // $estudiante = Estudiante::find($idestudiante);
        $estudiante = DB::table('estudiantes')
            ->select('estudiantes.*')
            ->where('idestudiante',$idestudiante)
            ->first();

        return view('estudiante.edit', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        // estamos recibiendo todos los datos a exception de ...
        $datosEstudiante = request()->except('_token', '_method');

        /*if( $request->hasFile('Foto') ){
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEstudiante['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        Estudiante::where('idestudiante','=',$id)->update($datosEstudiante);

        //$estudiante = Estudiante::findOrFail($id);

        $estudiante = DB::table('estudiantes')
            ->select('estudiantes.*')
            ->where('idestudiante',$id)
            ->first();

        return view('estudiante.edit', compact('estudiante'));
    }

    public function destroy($id)
    {
        //
        $estudiante = Estudiante::findOrFail($id);
        $estudiante::destroy($id);
        /*if(Storage::delete('public/'.$estudiante->Foto)){
            estudiante::destroy($id);
        }*/

        return redirect('/estudiante')->with('mensaje', 'estudiante borrado');
        //return redirect('/estudiante');

    }

}