@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>MATRICULAR A ESTUDIANTE</h1>
@stop

@section('content')

@livewire('prueba')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop