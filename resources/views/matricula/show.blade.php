@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

<style>
    .printbutton {
        cursor: pointer;
    }

    .centro {
        text-align: center;
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

    <h2 class="centro">INSTITUCION EDUCATIVA SECUNDARIA INDUSTRIAL 32</h2>
    <br>
    <h1 class="centro">FICHA DE MATRICULA</h1>
    <br>
    <h2 class="centro">{{ $reportematricula[0]->nombre}} {{ $reportematricula[0]->apellido_paterno }} {{ $reportematricula[0]->apellido_materno}}</h2>
    <br>
    <h3 class="centro"> Año académico {{ $reportematricula[0]->anio_academico }} </h3>
    <br>

    <br>
    <br>
    <div class="row">
        <div class="col-sm-6"><h3 style="text-align: start;"> N° Matricula / Dni: {{ $reportematricula[0]->dni }}</h3></div>
        <div class="col-sm-6"><h3 style="text-align: end;"> Grado y Seccion: {{ $reportematricula[0]->grado }}° - {{ $reportematricula[0]->seccion }}</h3></div>
        
        
    </div>
    
    <br>
    <br>
    <h2 >Cursos</h2>
    @foreach( $reportematricula as $reporte )
        <ul>   
            <li> <h4> {{ $reporte->descripcion }} </h4> </li>  
        </ul>
    @endforeach 














  
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
    
 