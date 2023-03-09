@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR DE DOCENTE</h1>
@stop

@section('content')


<form action="{{ url('/docente/'.$docente->iddocente) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('docente.form')
</form>

 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop