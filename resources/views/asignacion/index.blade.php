@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRO DE ASIGNACIONES</h1>
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
            <a class="btn btn-primary" href="{{ url('asignacion/create') }}">Asignar cursos a los docente</a>
        </div>
        
        <input type="hidden" value="{{ $i = 1 }}">
    
        @if ($asignacioness->count())
            {{-- cuerpo tabla --}}
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td> 
                            <td>Nombre </td>
                            <td>Profesion </td> 
                            <td colspan="2">Acciones </td>
                            <td>Ver mas </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $asignacioness as $asignacion )
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $asignacion->nombre }}</td>
                            <td>{{ $asignacion->profesion }}</td> 
                            <td>
                                <a class="btn btn-info" href="{{ url('/asignacion/'.$asignacion->idasignacion.'/edit') }}">Editar</a>
                                
                            </td>
                            <td>
                                <form action="{{ url('/asignacion/'.$asignacion->idasignacion) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                                </form>

                            </td>
                            <td>
                                <a href="{{ url('/asignacion/'.$asignacion->idasignacion) }}">Ver mas </a>
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