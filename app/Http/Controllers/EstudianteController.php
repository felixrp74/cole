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
use Illuminate\Validation\Rules\Password;

/**
 * Class EstudianteController
 * @package App\Http\Controllers
 */

class EstudianteController extends Controller
{
    public function reporte_estudiante_padre(){
        $estudiantes_apoderados = DB::select('SELECT e.dni, e.nombre, e.apellido_paterno, e.apellido_materno,
        a.dni_apoderado, a.nombre_apoderado, a.apellido_paterno_apoderado, a.celular_apoderado
        FROM estudiantes AS e
        JOIN apoderados AS a
        ON a.estudiantes_idestudiante = e.idestudiante
        ');

        // var_dump($estudiantes_apoderados);

        return view('reporte.estudiantes_apoderados', compact('estudiantes_apoderados'));

    }
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
        $request->validate( 
            [
                'dni' => ['required', 'size:8'],
                'nombre' => 'required',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'fecha_nacimiento' => 'required',
                'lugar_nacimiento' => 'required',
                'genero' => 'required',
                'direccion_actual' => 'required', 
                'celular' => 'required',
                'email' => ['required',  'email', 'unique:users,email'],
                'password' => ['required', Password::min(8)],
            ],
            [
                'dni.required' => 'El campo no puede estar vacio',
                'dni.numeric' => 'DNI debe ser numerico',
                'dni.max' => 'DNI debe ser maximo 8 digitos',
                'nombre.required' => 'El campo no puede estar vacio',
                'apellido_paterno.required' => 'El campo no puede estar vacio',
                'apellido_materno.required' => 'El campo no puede estar vacio',
                'profesion.required' => 'El campo no puede estar vacio',
                'celular.required' => 'El campo no puede estar vacio',
                'email.required' => 'El campo no puede estar vacio',
                'email.email' => 'El campo debe ser correo electrónico',
                'password.required' => 'El campo no puede estar vacio'
            ]
        );

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
        $user->identificador_estudiante = $estudiante->idestudiante;

        
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
        $estudiante = Estudiante::find($idestudiante); 
        $estudiante->update(request()->except('_token', '_method'));

        
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

        $users = User::where('identificador_estudiante', '=', $idestudiante)->get();

        // dump($users);
        if (isset($users[0])) {
            // Access the element at index 0
            $user = $users[0];
            if ($request->password != null) {
                # code...
                $user->password = Hash::make( $request->password );
            } 
            
            $user->name = $request->nombre .''. $request->apellido_paterno;
            $user->email = $request->email;
            // $user->roles()->sync($request->roles); // linea modo prueba
            
            $user->update(); 
        } else {
            // Handle the case when the index doesn't exist
            // or take appropriate action
        }
        
        

 
        return view('estudiante.edit', compact('estudiante'));
    }

    public function destroy($id)
    {
        DB::table('estudiantes')->where('idestudiante', $id)->delete();
       
        return redirect('/estudiante')->with('mensaje', 'estudiante borrado'); 
    }

}