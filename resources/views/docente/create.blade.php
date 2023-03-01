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
        </div>

        {{-- cuerpo tabla --}}
        <div class="card-body">
            <form action="{{ url('/docente') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <label for="Nombre">Nombre</label>
            <input type="text" name="Nombre" id="Nombre">
            <br>

            <label for="Profesion">Profesion</label>
            <input type="text" name="Profesion" id="Profesion">
            <br>

            <input class="btn btn-info" type="submit" value="Guardar datos">

            </form>
        </div>

        <div class="card-footer">
            
        </div> 
 
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop