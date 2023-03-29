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
