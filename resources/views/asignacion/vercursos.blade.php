@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>VER CURSOS ASIGNADOS</h1>
@stop

@section('content')


<div class="card">
    

 
    @if(isset($asignacioness))

    <div class="card-header">
        
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Docente</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" 
                value="{{ isset($asignacioness[0]->nombreDocente)?$asignacioness[0]->nombreDocente:'' }}, {{ isset($asignacioness[0]->paternoDocente)?$asignacioness[0]->paternoDocente:'' }} {{ isset($asignacioness[0]->maternoDocente)?$asignacioness[0]->maternoDocente:'' }}" id="">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Profesión</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="{{ isset($asignacioness[0]->profesionDocente)?$asignacioness[0]->profesionDocente:'' }}" id="">
            </div>
        </div> 
    </div>


    <input type="hidden" value="{{ $i = 1 }}">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr> 
                    <td>#</td> 
                    <td>Nombre estudiante</td> 
                    <td>Curso </td>
                    {{-- <td>Especialidad </td> --}}
                    {{-- <td>Id Grado </td> --}}
                    <td>Grado </td>
                    <td>Seccion </td>  
                </tr>
            </thead>
            <tbody>

                @foreach( $asignacioness as $asignacion )
                <tr>
                    <td>{{ $i++ }}</td> 
                    <td>{{ $asignacion->nombre }}</td> 
                    <td>{{ $asignacion->descripcion }}</td>
                    {{-- <td>{{ $asignacion->especialidad }}</td> --}}
                    {{-- <td>{{ $asignacion->idnivel }}</td> --}}
                    <td>{{ $asignacion->grado }}</td>
                    <td>{{ $asignacion->seccion }}</td>  
                </tr>
                @endforeach
            </tbody>
            
        </table>
    
    @else 
        <h1>Aun no se tiene ningun estudiante matriculado.</h1>
    @endif
        
    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop