<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

/**
 * Class DocenteController
 * @package App\Http\Controllers
 */
class DocenteController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datos['docentes'] = Docente::paginate(100);
        return view('docente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( 
            [
                'dni' => ['required', 'size:8'],
                'nombre' => 'required',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'profesion' => 'required',
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

        // $datosDocente = request()->except('_token');
        $datosDocente = request()->except('_token', '_method');
        $docente = Docente::create($datosDocente);
        // $docente = Docente::insert($datosDocente);

        // var_dump($datosDocente["nombre"]);
        // var_dump($datosDocente["email"]);
        // var_dump($docente->iddocente);
        // var_dump($datosDocente["dni"]);

        //agregar usuario tipo estudiante
        $user = new User();
        $user->name = $datosDocente["nombre"];
        $user->email = $datosDocente["email"];
        $user->password = Hash::make( $datosDocente["password"] );
        $user->identificador_docente = $docente->iddocente;        
        $user->assignRole('DocenteUsuario'); 
        $user->save(); 

        return redirect('/docente')->with('mensaje', 'Docente agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);

        return view('docente.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::find($id);

        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        
        $request->validate( 
            [
                'dni' => ['required', 'size:8'],
                'nombre' => 'required',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'profesion' => 'required',
                'celular' => 'required',
                // 'email' => ['required',  'email', 'unique:users,email'],
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

        // recibiendo todos los datos a exception de ...
        $datosDocente = request()->except('_token', '_method');

        Docente::where('iddocente','=',$id)->update($datosDocente);

        $user = User::where('identificador_docente', '=',$id)->first();
        $user->name = $datosDocente["nombre"];
        $user->email = $datosDocente["email"];
        $user->password = Hash::make( $datosDocente["password"] );
        $user->update(); 
        
        $docente = Docente::findOrFail($id);

        return view('docente.edit', compact('docente'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        /*
        $docente = Docente::find($id)->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'Docente deleted successfully');

        */

        $docente = Docente::findOrFail($id);
        $docente::destroy($id);
        /*if(Storage::delete('public/'.$docente->Foto)){
            docente::destroy($id);
        }*/

        return redirect('/docente')->with('mensaje', 'docente borrado');
        //return redirect('/docente');
    }
}
