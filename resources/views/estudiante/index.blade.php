@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRO DE ESTUDIANTES</h1>
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
                <a class="btn btn-primary" href="{{url('/estudiante/create')}}">Registrar Estudiante</a>
            </div>
    {{--             
            <div class="container">
                <input wire:model = "search" class="form-control" placeholder="buscar por nombre" type="text">
            </div> --}}
            
            <input type="hidden" value="{{ $i = 1 }}">
    
            @if ($estudiantes->count())
                {{-- cuerpo tabla --}}
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Dni</td>
                                <td>Nombre</td>
                                <td>Paterno</td>
                                <td>Materno</td>
                                <td>Genero</td>
                                {{-- <td>Celular</td> --}}
                                {{-- <td>Email</td> --}}
                                <td colspan="3">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $estudiantes as $estudiante )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $estudiante->dni }}</td>
                                <td>{{ $estudiante->nombre }}</td>
                                <td>{{ $estudiante->apellido_paterno }}</td>
                                <td>{{ $estudiante->apellido_materno }}</td>
                                <td>{{ $estudiante->genero }}</td>
                                {{-- <td>{{ $estudiante->celular }}</td> --}}
                                {{-- <td>{{ $estudiante->email }}</td> --}}
                                <td>
                                    <a class="btn btn-info" href="{{ url('/estudiante/'.$estudiante->idestudiante.'/edit') }}">Editar</a>
                                    {{-- <a class="btn btn-info" href="{{ route('estudiante.edit', compact('estudiante')) }}">Editar</a> --}}
                                </td>
                                <td>
                                    <form action="{{ url('/estudiante/'.$estudiante->idestudiante) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                                    </form>
                    
                                </td>
                                <td>
                                    @isset ($estudiante->file)
                                        {{-- <iframe id="pdf" src="{{Storage::url($estudiante->file->url)}}" frameborder="0"></iframe> --}}
                                        <a class="btn btn-info" href="{{Storage::url($estudiante->file->url)}}" target="_blank">Ver archivo</a>
                                    {{-- @else --}}
                                        {{-- <iframe id="pdf" src="/storage/files/archivo.pdf" frameborder="0"></iframe>                 --}}
                                    @endisset
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