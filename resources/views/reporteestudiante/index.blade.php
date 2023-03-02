@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REPORTE DE NOTAS ESTUDIANTE</h1>
@stop

@section('content')


<div class="card">
    {{-- cabecera tabla --}}
    <div class="card-header">
        {{-- <a class="btn btn-primary" href="{{url('/estudiante/create')}}">Registrar Estudiante</a> --}}
        {{-- <a class="btn btn-primary" href="{{ url('reporteestudiante/create') }}">Reporte Notas Estudiante</a> --}}
    </div>

@if ($reportenotas->count())
    
    <div class="card-body">
        <p><label for="Idestudiante">Id matricula: </label> {{ $reportenotas[0]->idmatricula }}</p>
        <p><label for="Idestudiante">Id estudiante: </label> {{ $reportenotas[0]->idestudiante }}</p>
        <p><label for="Idestudiante">Nombre y apellidos: </label> {{ $reportenotas[0]->nombre }}</p> 
    
    </div>

    {{-- cuerpo tabla --}}
    <div class="card-body">
        <table class="table table-striped" style="border: solid 1px;">
            <thead>
                <tr>   
                    <td style="border: solid 1px;"># </td>
                    <td style="border: solid 1px;">Curso </td>
                    <td style="border: solid 1px;">Especialidad </td>
                    <td style="border: solid 1px;">Nota 1</td>
                </tr>
            </thead>
            <tbody>

                
                <input type="hidden" value="{{ $i = 1 }}">

                @foreach( $reportenotas as $reporte )
                <tr>  
                    <td style="border: solid 1px;">{{ $i++ }}</td>
                    <td style="border: solid 1px;">{{ $reporte->descripcion }}</td>
                    <td style="border: solid 1px;">{{ $reporte->especialidad }}</td>
                    <td style="border: solid 1px;">{{ $reporte->nota1 }}</td> 
                    
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
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop