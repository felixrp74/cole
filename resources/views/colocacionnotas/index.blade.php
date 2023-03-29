@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>COLOCACION DE NOTAS</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
 
    @if (!empty($colocacionnotass))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
            <!-- <input type="text" value="{{  $idasignacion = (empty($colocacionnotass)) ? $colocacionnotass[0]->idasignacion : 1 }}">  -->
        </div>
    @endif

        <!-- (condicion) ? : -->
            
        {{-- <div class="container">
            <input wire:model = "search" class="form-control" placeholder="buscar por nombre" type="text">

        </div> --}}
            

        <input type="hidden" value="{{ $i = 1 }}">

        
        {{-- cuerpo tabla --}}
            
        <form action="{{ url('/colocacionnotas/'.$idasignacion) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            
            <div class="card">
                {{-- cabecera tabla --}}
                @if ($colocacionnotass->count())
                <div class="card-header"> 

                    <table class="table table-striped"> 
                        <tbody> 
                            <input type="hidden" value="{{ $i = 1 }}"> 
                            <tr>  
                                <td>Nombres y apellidos: </td>
                                <td>{{ $colocacionnotass[0]->nombreDocente }} {{ $colocacionnotass[0]->apellido_materno}}  {{ $colocacionnotass[0]->apellido_paterno }}</td> 
                            </tr>
                            <tr>  
                                <td>Enviar: </td>
                                <td><input class="btn btn-info" type="submit" value="Guardar datos"></td> 
                            </tr>
                            <tr>  
                            </tr> 
                        </tbody>
                    </table>
                    
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>   
                                <td># </td>
                                <td>Nombre </td>
                                <td>Grado </td>
                                <td>Seccion </td>
                                <td>Curso </td>
                                <td>Nota 1</td>
                                <td>Nota 2</td>
                                <td>Nota 3</td>
                                <td>Promedio</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $colocacionnotass as $colocacionnota )
                            <tr >  
                                <td>{{ $i }}</td>
                                <td>{{ $colocacionnota->nombre }}</td>
                                <td>{{ $colocacionnota->grado }}</td>
                                <td>{{ $colocacionnota->seccion }}</td>
                                <td>{{ $colocacionnota->descripcion }}</td>
                                {{-- <td>{{ $colocacionnota->especialidad }}</td> --}}
                                <td><input style="width: 50px;" type="number" name="{{ 'nota1'.$i }}" id="{{ 'nota1'.$i }}" value="{{ $colocacionnota->nota1 }}" max=20 min=0></td>
                                <td><input style="width: 50px;" type="number" name="{{ 'nota2'.$i }}" id="{{ 'nota2'.$i }}" value="{{ $colocacionnota->nota2 }}" max=20 min=0></td>
                                <td><input style="width: 50px;" type="number" name="{{ 'nota3'.$i }}" id="{{ 'nota3'.$i }}" value="{{ $colocacionnota->nota3 }}" max=20 min=0></td>
                                <td><p   name="{{ 'promedio'.$i }}" id="{{ 'promedio'.$i }}"> {{ $colocacionnota->promedio }} </p></td>
                                <input type="hidden" id="{{ 'estudiante'.$i }}" name="{{ 'estudiante'.$i }}" value="{{$colocacionnota->idestudiante}}">
                                <input type="hidden" id="{{ 'curso'.$i }}" name="{{ 'curso'.$i }}" value="{{$colocacionnota->idcurso}}">
                                <input type="hidden" id="{{ 'nivel'.$i }}" name="{{ 'nivel'.$i }}" value="{{$colocacionnota->idnivel}}">
                                <input type="hidden" id="{{ 'idmatricula'.$i }}" name="{{ 'idmatricula'.$i }}" value="{{$colocacionnota->idmatricula}}">
                                <input type="hidden" id="{{ 'idcurso'.$i }}" name="{{ 'idcurso'.$i++ }}" value="{{$colocacionnota->idcurso}}">
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>    
        </form>
            
            <div class="card-footer">

            </div> 
            
        @else
            <div class="card-body">
                <h4>No se tiene registro en la BASE DATOS...</h4>

            </div>
        @endif


    </div>
    
     
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop