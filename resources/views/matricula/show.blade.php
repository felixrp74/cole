@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content') 

    @if ($reportenotas->count())

    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-header"> 
                <h5>Institucion Educativa Segundaria</h5>
                <h5>Industrial 32</h5>
                <h5>FICHA DE MATRICULA</h5>
                <h5>N° de Matricula: {{ $reportenotas[0]->idmatricula  }}</h5> 
            </div>
            <div class="card-body"> 
                
                <p><label for="Nombre">Dni: </label> {{ $reportenotas[0]->dni}}</p>
                <p><label for="Nombre">Nombre: </label> {{ $reportenotas[0]->nombre}}</p>
                <p><label for="Nombre">Paterno: </label> {{ $reportenotas[0]->apellido_paterno}}</p>
                <p><label for="Nombre">Materno: </label> {{ $reportenotas[0]->apellido_materno}}</p>
                <p><label for="Nombre">Grado: </label> {{ $reportenotas[0]->grado}}</p>
                <p><label for="Nombre">Seccion: </label> {{ $reportenotas[0]->seccion}}</p>
            </div>
        
        </div>
    </div> 

    <div class="card"> 
        
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