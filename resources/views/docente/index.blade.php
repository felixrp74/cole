@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRO DE DOCENTES</h1>
@stop

@section('content')
 
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        {{-- cabecera tabla --}}
        <div class="card-header">
            <a class="btn btn-primary" href="{{url('/docente/create')}}">Registrar Docente</a>
        </div>
        
        <input type="hidden" value="{{ $i = 1 }}">

        @if ($docentes->count())
            {{-- cuerpo tabla --}}
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>DNI</td>
                            <td>Nombre y apellido</td>
                            <td>Profesión</td>
                            <td colspan="2">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $docentes as $docente )
                        <tr>
                            <td>{{ $docente->iddocente }}</td>
                            <td>{{ $docente->dni }}</td>
                            <td>{{ $docente->nombre }} {{ $docente->apellido_paterno }} {{ $docente->apellido_materno }}</td>
                            <td>{{ $docente->profesion }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ url('/docente/'.$docente->iddocente.'/edit') }}">Editar</a>
                            </td>
                            <td>
                                <form action="{{ url('/docente/'.$docente->iddocente) }}" method="POST">
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
 
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop