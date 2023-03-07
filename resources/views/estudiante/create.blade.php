@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRAR DE ESTUDIANTE</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <form action="{{ url('/estudiante') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    
    <label for="Dni">Dni</label>
    <input type="text" name="dni" id="Dni">
    <br>
    <label for="Nombre">Nombre</label>
    <input type="text" name="nombre" id="Nombre">
    <br>
    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" name="apellido_paterno" id="ApellidoPaterno">
    <br>
    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" name="apellido_materno" id="ApellidoMaterno">
    <br>
    <label for="FechaNacimiento">Fecha Nacimiento</label>
    <input type="date" name="fecha_nacimiento" id="FechaNacimiento">
    <br>
    <label for="LugarNacimiento">Lugar Nacimiento</label>
    <input type="text" name="lugar_nacimiento" id="LugarNacimiento">
    <br>
    <label for="Genero">Genero</label>
    <select type="text" name="genero" id="Genero">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select>
    <br>
    <label for="DireccionActual">Direccion Actual</label>
    <input type="text" name="direccion_actual" id="DireccionActual">
    <br>
    <label for="Celular">Celular</label>
    <input type="text" name="celular" id="Celular">
    <br>
    <label for="Email">Email</label>
    <input type="text" name="email" id="Email">
    <br>
    <label for="Password">Password</label>
    <input type="text" name="password" id="Password">
    <br>
    
    <input class="btn btn-info" type="submit" value="Guardar datos">
    
    </form>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

