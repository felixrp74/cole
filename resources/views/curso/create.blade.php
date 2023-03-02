@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRAR CURSO</h1>
@stop

@section('content')

<div>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    Formulario de cracion de estudiante

    <form action="{{ url('/curso') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <label for="Curso">Curso</label>
    <input type="text" name="Curso" id="Curso" value="ARTE">
    <br>

    <label for="Especialidad">Especialidad</label>
    <input type="text" name="Especialidad" id="Especialidad" value="ESPECIALIDAD">
    <br>

    <label for="Grado">Grado</label>
    <input type="text" name="Grado" id="Grado" value="1">
    <br>

    <label for="Seccion">Seccion</label>
    <input type="text" name="Seccion" id="Seccion" value="D">
    <br>

    <input class="btn btn-info" type="submit" value="Guardar datos">

    </form>

     
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop