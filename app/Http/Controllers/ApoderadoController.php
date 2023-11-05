<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Apoderado;

class ApoderadoController extends Controller
{
    //
    public function index()
    {
        $datos['apoderados'] = Apoderado::all();
        return view('apoderado.index', $datos);
    }

    public function create()
    {
        return view('apoderado.create'); 
    }
    
    public function store(Request $request)
    {     
        
        $request->validate( 
            [
                'dni' => ['required', 'size:8'],
                'nombre_apoderado' => 'required',
                'apellido_paterno_apoderado' => 'required',
                'lugar_nacimiento_apoderado' => 'required',
                'dni_apoderado' => 'required',
                'apellido_materno_apoderado' => 'required',
                'fecha_nacimiento_apoderado' => 'required' 
            ],
            [
                'dni.required' => 'El campo no puede estar vacio',
                'dni.numeric' => 'DNI debe ser numerico',
                'dni.max' => 'DNI debe ser maximo 8 digitos',
                'nombre_apoderado.required' => 'El campo no puede estar vacio',
                'apellido_paterno_apoderado.required' => 'El campo no puede estar vacio',
                'lugar_nacimiento_apoderado.required' => 'El campo no puede estar vacio',
                'dni_apoderado.required' => 'El campo no puede estar vacio',
                'apellido_materno_apoderado.required' => 'El campo no puede estar vacio',
                'fecha_nacimiento_apoderado.required' => 'El campo no puede estar vacio', 
            ]
        );

        $datosEstudianteApoderado = request()->except('_token');


        $datosEstudiante = array(
            "idestudiante" => $datosEstudianteApoderado["estudiantes_idestudiante"],
            "nombre" => $datosEstudianteApoderado["nombre_estudiante"],
            "apellido_paterno" => $datosEstudianteApoderado["apellido_paterno_estudiante"],
            "apellido_materno" => $datosEstudianteApoderado["apellido_materno_estudiante"]
            
        );


        // dd($datosEstudiante);
 
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
            "estudiantes_idestudiante" => (int) $datosEstudiante["idestudiante"]
        );


        $apoderado = Apoderado::create($datosApoderado);


        if($request->file('documento')){

            $url = Storage::put('files', $request->file('documento'));
            $apoderado->file()->create([
                'url' => $url
            ]);
             
        } 


        return redirect('/apoderado')->with('mensaje', 'Empleado agregado con exito');
        


    }

    public function edit($idapoderado)
    {
        $apoderado = DB::table('apoderados')
        ->select('apoderados.*')
        ->where('idapoderado',$idapoderado)
        ->first();

        return view('apoderado.edit', compact('apoderado'));
    }

    public function update(Request $request, $idapoderado)
    { 
 
        // $estudiante = Estudiante::where('idapoderado', $idapoderado);
        $apoderado = apoderado::find( $idapoderado );
        $apoderado->update($request->all());

        
        if($request->file('documento')){
        
            $url = Storage::put('files', $request->file('documento'));
            
            if($apoderado->file){
                Storage::delete($apoderado->file->url);
                
                $apoderado->file->update([
                    'url' => $url
                ]);

            }else{
                $apoderado->file()->create([
                    'url' => $url
                ]);
            }
        }

        

        // return $this->index();
        return view('apoderado.edit', compact('apoderado'));
    }

    public function destroy($id)
    {
        DB::table('apoderados')->where('idapoderado', $id)->delete();
       
        return redirect('/apoderado')->with('mensaje', 'apoderado borrado'); 
    }

}
