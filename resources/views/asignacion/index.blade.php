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
                            <td style="border: solid 1px;"># Id Asignacion</td>
                            <td style="border: solid 1px;"># Id Docente</td>
                            <td style="border: solid 1px;">Nombre </td>
                            <td style="border: solid 1px;">Profesion </td>
                            <td colspan="2" style="border: solid 1px;">Acciones </td>
                            <td style="border: solid 1px;">Ver mas </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $asignacioness as $asignacion )
                        <tr>
                            <td style="border: solid 1px;">{{ $asignacion->idasignacion }}</td>
                            <td style="border: solid 1px;">{{ $asignacion->iddocente }}</td>
                            <td style="border: solid 1px;">{{ $asignacion->nombre }}</td>
                            <td style="border: solid 1px;">{{ $asignacion->profesion }}</td>
                            <td style="border: solid 1px;">
                                <a class="btn btn-info" href="{{ url('/asignacion/'.$asignacion->idasignacion.'/edit') }}">Editar</a>
                                
                            </td>
                            <td style="border: solid 1px;">
                                <form action="{{ url('/asignacion/'.$asignacion->idasignacion) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                                </form>

                            </td>
                            <td style="border: solid 1px;">
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