@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ASIGNAR DOCENTE</h1>
@stop

@section('content')

@livewire('asignacion-create')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop