<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $datosForm = request()->except('_token');
        dump($datosForm);

        // // HECHO. Consular la tabla 'niveles' where grado = 1 y seccion = C para extraer el valor de 'idniveles' "3".
        // $nivel = Nivele::where('grado', $datosForm['grado'])
        //     ->where('seccion', $datosForm['seccion'])->first();
        // // dump($nivel->idnivel);

        // // // Consultar la tabla 'cursos' where 'idniveles' "3" para extraer el array de cursos e insertarlo en 'detall_matricula'. 
        // $cursos = DB::select('select * from cursos where niveles_idniveles = :id', ['id' => $nivel->idnivel]);
        // // dump($cursos);        

        // $estudiante = Estudiante::where('idestudiante', '=', $datosForm['idestudiante']);
        
        // DB::table('matriculas')->insert(
        //     [
        //         'estudiante_idestudiante' => $datosForm['idestudiante'],
        //         'anio_academico' => $datosForm['anio_academico']
        //     ]
        // );
        
        // $matricula = Matricula::where('estudiante_idestudiante', $datosForm['idestudiante'])->first();
        // // dump($matricula->idmatricula);
        // // dump($matricula->estudiante_idestudiante);
        // // dump($datosForm['idestudiante']);
            
        // foreach($cursos as $curso){
        //     DB::table('detalle_matriculas')->insert(
        //         [
        //             'matriculas_idmatricula' => $matricula->idmatricula, 
        //             'cursos_idcurso' => $curso->idcurso
        //         ]
        //     );

        // }
        
        // return redirect('/matricula')->with('mensaje', 'Matricula agregado con exito');

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

}
