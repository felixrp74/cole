<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Apoderado;
use App\Models\User;
// use App\Http\Controllers\Role;

use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

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
        $roles = Role::all();        
        // dd($roles);
        return view('estudiante.create', compact('roles'));
        // return view('estudiante.create'); 
    }

    public function store(Request $request)
    {        
        $datosEstudianteApoderado = request()->except('_token');
        
        // dd($datosEstudianteApoderado);

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

        //agregar usuario tipo estudiante
        $user = new User();
        $user->name = $datosEstudianteApoderado["nombre"];
        $user->email = $datosEstudianteApoderado["email"];
        $user->password = Hash::make( $datosEstudianteApoderado["password"] );
        // $user->escuela = "colegio32";
        
        $rolesEstudiante = array( "0" => "2" ); // 2 estudiante
         
        $user->assignRole('EstudianteUsuario');
 
        $user->save();

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
 
        return view('estudiante.edit', compact('estudiante'));
    }

    public function destroy($id)
    {
        DB::table('estudiantes')->where('idestudiante', $id)->delete();
       
        return redirect('/estudiante')->with('mensaje', 'estudiante borrado'); 
    }

}