@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRO DE DOCENTES</h1>
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
            <a class="btn btn-primary" href="{{url('/docente/create')}}">Registrar Docente</a>
        </div>
        
        <input type="hidden" value="{{ $i = 1 }}">

        @if ($docentes->count())
            {{-- cuerpo tabla --}}
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td style="border: solid 1px;">#</td>
                            <td style="border: solid 1px;">Nombre</td>
                            <td style="border: solid 1px;">Docente</td>
                            <td style="border: solid 1px;" colspan="2">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $docentes as $docente )
                        <tr>
                            <td style="border: solid 1px;">{{ $docente->iddocente }}</td>
                            <td style="border: solid 1px;">{{ $docente->nombre }}</td>
                            <td style="border: solid 1px;">{{ $docente->profesion }}</td>
                            <td style="border: solid 1px;">
                                <a class="btn btn-info" href="{{ url('/docente/'.$docente->iddocente.'/edit') }}">Editar</a>
                            </td>
                            <td style="border: solid 1px;">
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
</div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop