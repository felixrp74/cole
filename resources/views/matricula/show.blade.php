@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<style>
    .printbutton {
        cursor: pointer;
    }
</style>

@stop

@section('content') 


@if ($reportematricula->count())
<div id="imp1" class="d-flex justify-content-center">
    <div class="card"> 
        <div class="card-body">
        <input type="button" class="btn btn-info" value="PRINT" id="printbutton" onclick="javascript:imprim1(imp1);">
        </div>
    </div>
</div>
@endif
                
                
        {{-- cuerpo tabla --}}
        <div class="card-body">

    @if ($reportematricula->count())

    <div id="imp1" class="d-flex justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header"> 
                    <h5 class="d-flex justify-content-center">FICHA DE MATRICULA</h5>
                    <h5 class="d-flex justify-content-center">Institucion Educativa Secundaria</h5>
                    <h5 class="d-flex justify-content-center">Industrial 32</h5>
                    <h5 class="d-flex justify-content-center">N° de Matricula: {{ $reportematricula[0]->idmatricula  }}</h5> 
                </div>
                <div class="card-body"> 
                    
                    <p style="margin: 1px;"><label for="Nombre">Dni: </label> {{ $reportematricula[0]->dni}}</p>
                    <p style="margin: 1px;"><label for="Nombre">Nombre: </label> {{ $reportematricula[0]->nombre}}</p>
                    <p style="margin: 1px;"><label for="Nombre">Paterno: </label> {{ $reportematricula[0]->apellido_paterno}}</p>
                    <p style="margin: 1px;"><label for="Nombre">Materno: </label> {{ $reportematricula[0]->apellido_materno}}</p>
                    <p style="margin: 1px;"><label for="Nombre">Grado: </label> {{ $reportematricula[0]->grado}}</p>
                    <p style="margin: 1px;"><label for="Nombre">Seccion: </label> {{ $reportematricula[0]->seccion}}</p>
                </div>
            
            </div>
        </div> 

        <div class="d-flex justify-content-center">
            <div class="card"> 
                
                
                {{-- cuerpo tabla --}}
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>   
                                <td>N° </td>
                                <td>Curso </td>  
                            </tr>
                        </thead>
                        <tbody>

                            
                            <input type="hidden" value="{{ $i = 1}} {{ $promedio_final = 0.0}}">

                            @foreach( $reportematricula as $reporte )
                            <tr>  
                                <td>{{ $i++ }}</td>
                                <td>{{ $reporte->descripcion }}</td> 
        
                                
                            </tr>
                            @endforeach 
                        </tbody>
                    
                    </table>
                </div>
                
            
            @else
                <div class="card-body">
                    <h4>No se tiene registro en la BASE DATOS...</h4>
                </div>
            @endif
            
            </div>
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        document.querySelectorAll('#printbutton').forEach(function(element) {
            element.addEventListener('click', function() {
                // document.getElementById("printbutton");
                document.getElementById('printbutton').type = 'hidden';
                print();
                document.getElementById('printbutton').type = 'button';
            });
        });
 
    </script>
@stop