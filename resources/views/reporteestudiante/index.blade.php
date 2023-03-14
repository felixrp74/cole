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
    <table class="table table-striped" style="border: solid 1px;">
        <thead>
            <tr>   
                <td style="border: solid 1px;">Dato </td>
                <td style="border: solid 1px;">Valor </td> 
                <td style="border: solid 1px;">Dato </td>
                <td style="border: solid 1px;">Valor </td> 
            </tr>
        </thead>
        <tbody>

            
            <input type="hidden" value="{{ $i = 1 }}">

             
            <tr>  
                <td style="border: solid 1px;">Id estudiante: </td>
                <td style="border: solid 1px;">{{ $reportenotas[0]->idestudiante}}</td>
                <td style="border: solid 1px;">DNI: </td>
                <td style="border: solid 1px;">{{ $reportenotas[0]->dni }}</td>
            </tr>
            <tr>  
                <td style="border: solid 1px;">Nombre: </td>
                <td style="border: solid 1px;">{{ $reportenotas[0]->nombre }}</td>
                <td style="border: solid 1px;">Paterno: </td>
                <td style="border: solid 1px;">{{ $reportenotas[0]->apellido_paterno }}</td>
            </tr>
            <tr>  
                <td style="border: solid 1px;">Materno: </td>
                <td style="border: solid 1px;">{{ $reportenotas[0]->apellido_materno}}</td>
                <td style="border: solid 1px;">Celular: </td>
                <td style="border: solid 1px;">{{ $reportenotas[0]->celular}}</td>
            </tr>
            <tr>  
                <td style="border: solid 1px;">Año académico: </td>
                <td style="border: solid 1px;">{{ isset($reportenotas[0]->anio_academico) ? $reportenotas[0]->anio_academico : 'no tiene valor  ' }}</td>
                
                {{-- <td style="border: solid 1px;">{{ $reportenotas[0]->email}}</td> --}}
            </tr>
        </tbody>
    </table>

    
    
</div>



    {{-- cuerpo tabla --}}
    <div class="card-body">
        <table class="table table-striped" style="border: solid 1px;">
            <thead>
                <tr>   
                    <td style="border: solid 1px;"># </td>
                    <td style="border: solid 1px;">Curso </td>
                    {{-- <td style="border: solid 1px;">Especialidad </td> --}}
                    <td style="border: solid 1px;">Trimester I</td>
                    <td style="border: solid 1px;">Trimester II</td>
                    <td style="border: solid 1px;">Trimester III</td>
                    <td style="border: solid 1px;">Promedio</td>
                </tr>
            </thead>
            <tbody>

                
                <input type="hidden" value="{{ $i = 1}} {{ $promedio_final = 0.0}}">

                @foreach( $reportenotas as $reporte )
                <tr>  
                    <td style="border: solid 1px;">{{ $i++ }}</td>
                    <td style="border: solid 1px;">{{ $reporte->descripcion }}</td>
                    {{-- <td style="border: solid 1px;">{{ $reporte->especialidad }}</td> --}}
                    <td style="border: solid 1px;">{{ $reporte->nota1 }}</td> 
                    <td style="border: solid 1px;">{{ $reporte->nota2 }}</td> 
                    <td style="border: solid 1px;">{{ $reporte->nota3 }}</td> 
                    <td style="border: solid 1px;">{{ $reporte->promedio }}</td> 

                    <input type="hidden" value="{{ $promedio_final += $reporte->promedio}}">
                    
                </tr>
                @endforeach
                <tr>  
                    
                    <input type="hidden" value="{{ $i-- }}">
                    <td style="border: solid 1px;" colspan="5">Promedio final</td> 
                    <td style="border: solid 1px;" colspan="1">{{ $promedio_final/$i }}</td> 

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