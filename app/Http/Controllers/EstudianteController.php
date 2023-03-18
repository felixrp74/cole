<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Apoderado;

use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
 
        $estudiante = Estudiante::create(request()->all());

        if($request->file('documento')){

            $url = Storage::put('files', $request->file('documento'));
            $estudiante->file()->create([
                'url' => $url
            ]);
             
        } 

        return $this->index();

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
        $estudiante = DB::table('estudiantes')
        ->select('estudiantes.*')
        ->where('idestudiante',$idestudiante)
        ->first();

        return view('estudiante.edit', compact('estudiante'));
    }

    public function update(Request $request, $idestudiante)
    {
        // estamos recibiendo todos los datos a exception de ...
        $datosEstudiante = request()->except('_token', '_method');
 
        $datosEstudiante = array(
            "dni" => $datosEstudiante["dni"],
            "nombre" => $datosEstudiante["nombre"],
            "apellido_paterno" => $datosEstudiante["apellido_paterno"],
            "apellido_materno" => $datosEstudiante["apellido_materno"],
            "fecha_nacimiento" => $datosEstudiante["fecha_nacimiento"],
            "lugar_nacimiento" => $datosEstudiante["lugar_nacimiento"],
            "genero" => $datosEstudiante["genero"],
            "direccion_actual" => $datosEstudiante["direccion_actual"],
            "celular" => $datosEstudiante["celular"],
            "email" => $datosEstudiante["email"],
            "password" => $datosEstudiante["password"],
            "documento" => $datosEstudiante["documento"]
        );        
 
        // $estudiante = Estudiante::where('idestudiante', $idestudiante);
        $estudiante = Estudiante::find( $idestudiante );
        $estudiante->update($request->all());

        
        if($request->file('documento')){
        
            $url = Storage::put('files', $request->file('documento'));
            
            if($estudiante->file){
                Storage::delete($estudiante->file->url);
                
                $estudiante->file->update([
                    'url' => $url
                ]);

            }else{
                $estudiante->file()->create([
                    'url' => $url
                ]);
            }
        }

        // return $this->index();
        return view('estudiante.edit', compact('estudiante'));
    }

    public function destroy($id)
    {
        DB::table('estudiantes')->where('idestudiante', $id)->delete();
       
        return redirect('/estudiante')->with('mensaje', 'estudiante borrado'); 
    }

}