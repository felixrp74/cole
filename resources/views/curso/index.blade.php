@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRO DE CURSO</h1>
@stop

@section('content')

<div>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        {{-- cabecera tabla --}}
        <div class="card-header">
            {{-- <a class="btn btn-primary" href="{{url('/estudiante/create')}}">Registrar Estudiante</a> --}}
            {{-- <a class="btn btn-primary" href="{{ url('asignacion/create') }}">Asignar cursos a los docente</a> --}}
            <a class="btn btn-info" href="{{ url('curso/create') }}">Registrar curso</a>
        </div>
        
        <input type="hidden" value="{{ $i = 1 }}">
    
        @if ($cursoss->count())
            {{-- cuerpo tabla --}}
            <div class="card-body">
            
            <table class="table table-striped" style="border: solid 1px;">
            <thead>
                <tr>
                    <td style="border: solid 1px;">#</td>
                    <td style="border: solid 1px;">Nombre</td>
                    <td style="border: solid 1px;">Especialidad</td>
                    <td style="border: solid 1px;">Grado</td>
                    <td style="border: solid 1px;">Seccion</td>
                    <td colspan="2" style="border: solid 1px;">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach( $cursoss as $curso )
                <tr>
                    <td style="border: solid 1px;">{{ $curso->idcurso }}</td>
                    <td style="border: solid 1px;">{{ $curso->descripcion }}</td>
                    <td style="border: solid 1px;">{{ $curso->especialidad }}</td>
                    <td style="border: solid 1px;">{{ $curso->grado }}</td>
                    <td style="border: solid 1px;">{{ $curso->seccion }}</td>
                    <td style="border: solid 1px;">
                        <a class="btn btn-info" href="{{ url('/curso/'.$curso->idcurso.'/edit') }}">Editar</a>
                    </td>
                    <td style="border: solid 1px;">
                        <form action="{{ url('/curso/'.$curso->idcurso) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        
    </div>
    
    <div class="card-footer">
        
    </div> 
    
@else
    <div class="card-body">
        <h4>No se tiene registro en la BASE DATOS...</h4>
    </div>
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