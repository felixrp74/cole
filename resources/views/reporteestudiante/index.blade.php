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
                <td style="border: solid 1px;">Email: </td>
                <td style="border: solid 1px;">{{ $reportenotas[0]->email}}</td>
            
                <td style="border: solid 1px;" colspan="2"> <input type="button" class="btn btn-info" value="EDITAR"> </td>
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
                    <td style="border: solid 1px;">Nota 1</td>
                    <td style="border: solid 1px;">Nota 2</td>
                    <td style="border: solid 1px;">Nota 3</td>
                    <td style="border: solid 1px;">Promedio</td>
                </tr>
            </thead>
            <tbody>

                
                <input type="hidden" value="{{ $i = 1 }}">

                @foreach( $reportenotas as $reporte )
                <tr>  
                    <td style="border: solid 1px;">{{ $i++ }}</td>
                    <td style="border: solid 1px;">{{ $reporte->descripcion }}</td>
                    {{-- <td style="border: solid 1px;">{{ $reporte->especialidad }}</td> --}}
                    <td style="border: solid 1px;">{{ $reporte->nota1 }}</td> 
                    <td style="border: solid 1px;">{{ $reporte->nota2 }}</td> 
                    <td style="border: solid 1px;">{{ $reporte->nota3 }}</td> 
                    <td style="border: solid 1px;">{{ $reporte->promedio }}</td> 
                    
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