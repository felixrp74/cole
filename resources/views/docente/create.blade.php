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

            <label for="Dni">Dni</label>
            <input type="text" name="dni" id="dni">
            <br>

            <label for="Nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <br>

            <label for="Profesion">Profesion</label>
            <input type="text" name="profesion" id="profesion">
            <br>

            <label for="Apellido Paterno">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno">
            <br>

            <label for="Apellido Materno">Apellido Materno</label>
            <input type="text" name="apellido_materno" id="apellido_materno">
            <br>

            <label for="Celular">Celular</label>
            <input type="text" name="celular" id="celular">
            <br>

            <label for="Email">Email</label>
            <input type="text" name="email" id="email">
            <br>

            <label for="Password">Password</label>
            <input type="text" name="password" id="password">
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