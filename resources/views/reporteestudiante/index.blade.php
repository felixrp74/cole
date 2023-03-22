@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REPORTE DE NOTAS ESTUDIANTE</h1>
@stop

@section('content')
 

 

<div class="card">
    {{-- cabecera tabla --}}

@if ($reportenotas->count())
<div class="card-header">
    <table class="table table-striped" >
        <thead>
            <tr>   
                <td >Campo </td>
                <td >Valor </td>  
            </tr>
        </thead>
        <tbody>

            
            <input type="hidden" value="{{ $i = 1 }}">

             
            <tr>  
                <td >DNI: </td>
                <td >{{ $reportenotas[0]->dni }}</td>
            </tr>
            <tr>  
                <td >Nombres y apellidos: </td>
                <td >{{ $reportenotas[0]->nombre }} {{ $reportenotas[0]->apellido_paterno }} {{ $reportenotas[0]->apellido_materno}}</td> 
              
            </tr>
            <tr>  
                <td >Celular: </td>
                <td >{{ $reportenotas[0]->celular}}</td>
            </tr>
            <tr>  
                <td >Año académico: </td>
                <td >{{ isset($reportenotas[0]->anio_academico) ? $reportenotas[0]->anio_academico : 'no tiene valor  ' }}</td>
                
                {{-- <td >{{ $reportenotas[0]->email}}</td> --}}
            </tr>
        </tbody>
    </table>

    
    
</div>



    {{-- cuerpo tabla --}}
    <div class="card-body">
        <table class="table table-striped" >
            <thead>
                <tr>   
                    <td ># </td>
                    <td >Curso </td>
                    {{-- <td >Especialidad </td> --}}
                    <td >Trimester I</td>
                    <td >Trimester II</td>
                    <td >Trimester III</td>
                    <td >Promedio</td>
                </tr>
            </thead>
            <tbody>

                
                <input type="hidden" value="{{ $i = 1}} {{ $promedio_final = 0.0}}">

                @foreach( $reportenotas as $reporte )
                <tr>  
                    <td >{{ $i++ }}</td>
                    <td >{{ $reporte->descripcion }}</td>
                    {{-- <td >{{ $reporte->especialidad }}</td> --}}
                    <td >{{ $reporte->nota1 }}</td> 
                    <td >{{ $reporte->nota2 }}</td> 
                    <td >{{ $reporte->nota3 }}</td> 
                    <td >{{ $reporte->promedio }}</td> 

                    <input type="hidden" value="{{ $promedio_final += $reporte->promedio}}">
                    
                </tr>
                @endforeach
                <tr>  
                    
                    <input type="hidden" value="{{ $i-- }}">
                    <td  colspan="5">Promedio final</td> 
                    <td  colspan="1">{{ $promedio_final/$i }}</td> 

                </tr>
            </tbody>
        
        </table>
    </div>
    
    <div class="card-footer">
        <input type="button" class="btn btn-info" value="Imprimir">
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