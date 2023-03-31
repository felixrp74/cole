@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRO DE PADRES</h1>
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
                <a class="btn btn-primary" href="{{url('/apoderado/create')}}">Registrar apoderado</a>
            </div>
    {{--             
            <div class="container">
                <input wire:model = "search" class="form-control" placeholder="buscar por nombre" type="text">
            </div> --}}
            
            <input type="hidden" value="{{ $i = 1 }}">
    
            @if ($apoderados->count())
                {{-- cuerpo tabla --}}
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Dni</td>
                                <td>Nombre y apellidos</td> 
                                <td>Genero</td>
                                {{-- <td>Celular</td> --}}
                                {{-- <td>Email</td> --}}
                                <td colspan="3">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $apoderados as $apoderado )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $apoderado->dni_apoderado }}</td>
                                <td>{{ $apoderado->nombre_apoderado }} {{ $apoderado->apellido_paterno_apoderado }} {{ $apoderado->apellido_materno_apoderado }}</td>
                                <td>{{ $apoderado->genero_apoderado }}</td>
                                {{-- <td>{{ $apoderado->celular }}</td> --}}
                                {{-- <td>{{ $apoderado->email }}</td> --}}
                                <td>
                                    <a class="btn btn-info" href="{{ url('/apoderado/'.$apoderado->idapoderado.'/edit') }}">Editar</a>
                                    {{-- <a class="btn btn-info" href="{{ route('apoderado.edit', compact('apoderado')) }}">Editar</a> --}}
                                </td>
                                <td>
                                    <form action="{{ url('/apoderado/'.$apoderado->idapoderado) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('quieres borrar?')" value="Borrar">
                                    </form>
                    
                                </td>
                                <td>
                                    @isset ($apoderado->file)
                                        {{-- <iframe id="pdf" src="{{Storage::url($apoderado->file->url)}}" frameborder="0"></iframe> --}}
                                        <a class="btn btn-info" href="{{Storage::url($apoderado->file->url)}}" target="_blank">Ver archivo</a>
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