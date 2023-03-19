@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR DE DOCENTE</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ url('/docente/'.$docente->iddocente) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('docente.form')
        </form>
        
    </div>
</div>

 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop