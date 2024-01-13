<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante; 
use App\Models\User; 

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules\Password;

  
class EstudianteController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imprimir_estudiantes()
    {
        $estudiantes = Estudiante::all();

        return view('reporte.estudiantes_imprimir', compact('estudiantes'));
        // return view('docente.index');
    }

    public function reporte_estudiante_padre(){
        $estudiantes_apoderados = DB::select('SELECT e.dni, e.nombre, e.apellido_paterno, e.apellido_materno,
        a.dni_apoderado, a.nombre_apoderado, a.apellido_paterno_apoderado, a.apellido_materno_apoderado, a.celular_apoderado
        FROM estudiantes AS e
        LEFT JOIN apoderados AS a
        ON a.estudiantes_idestudiante = e.idestudiante
        
        ORDER BY a.nombre_apoderado DESC
        '); 

        return view('reporte.estudiantes_apoderados', compact('estudiantes_apoderados'));

    }
    public function index()
    { 
        return view('estudiante.index');
    }

    public function create()
    {
        $roles = Role::all();         
        return view('estudiante.create', compact('roles')); 
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
        $user->tipo_usuario = "estudiante";
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
            $user = $users[0];
            if ($request->password != null) {
                # code...
                $user->password = Hash::make( $request->password );
            } 
            
            $user->name = $request->nombre .''. $request->apellido_paterno;
            $user->email = $request->email;
            
            $user->update(); 

        } else {
            $estudiantil = $users[0];
            $user = new User();
            $user->name = $estudiantil->nombre;
            $user->email = $estudiantil->email;
            $user->password = Hash::make( $estudiantil->password );
            $user->identificador_docente = $idestudiante;        
            $user->assignRole('EstudianteUsuario'); 
            $user->save(); 
        } 
 
        return view('estudiante.edit', compact('estudiante'));
    }

    public function destroy($id)
    {
        DB::table('estudiantes')->where('idestudiante', $id)->delete();
       
        return redirect('/estudiante')->with('mensaje', 'estudiante borrado'); 
    }

}