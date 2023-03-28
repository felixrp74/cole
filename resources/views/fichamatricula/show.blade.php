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

    @if ($reportematricula->count())

    
    <div class="row">
        <div class="col-sm-6 pl-5"> 
            <h3 style="text-align: start;"><img style="width: auto; height: 95px;" src="http://www.industrial32puno.edu.pe/wp-content/uploads/2022/10/cropped-LOGO-I32-22.png" alt=""></h3>
        </div>
        <div class="col-sm-6"> 
        
            {{-- <h3 style="text-align: end;"><img style="width: auto; height: 95px;" src="https://seeklogo.com/images/M/ministerio_de_educacion_-_peru-logo-72FA497226-seeklogo.com.png" alt=""></h3></div> --}}
            <h3 style="text-align: end;"><img style="text-align: end; width: auto; height: 95px;" src="https://upload.wikimedia.org/wikipedia/commons/2/21/Logo_del_Ministerio_de_Educaci%C3%B3n_del_Per%C3%BA_-_MINEDU.png" alt=""></h3></div>
        </div>
        
        
    </div>
    
    <br>
    <br>

    <h2 class="centro pl-5">INSTITUCION EDUCATIVA SECUNDARIA INDUSTRIAL 32</h2>
    <br>
    <h1 class="centro pl-5">FICHA DE MATRICULA</h1>
    <br>
    <h2 class="centro pl-5">{{ $reportematricula[0]->nombre}} {{ $reportematricula[0]->apellido_paterno }} {{ $reportematricula[0]->apellido_materno}}</h2>
    <br>
    <h3 class="centro pl-5"> Año académico {{ $reportematricula[0]->anio_academico }} </h3>
    <br>

    <br>
    <br>
    <div class="row">
        <div class="col-sm-6 pl-5"><h3 style="text-align: start;"> N° Matricula / Dni: {{ $reportematricula[0]->dni }}</h3></div>
        <div class="col-sm-6"><h3 style="text-align: end;"> Grado y Seccion: {{ $reportematricula[0]->grado }}° - {{ $reportematricula[0]->seccion }}</h3></div>
        
        
    </div>
    
    <br>
    <br>
    <h2 class="pl-5">Cursos</h2>
    @foreach( $reportematricula as $reporte )
        <ul class="ml-4">   
            <li class=" pl-5"> <h4 > {{ $reporte->descripcion }} </h4> </li>  
        </ul>
    @endforeach 


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
    
 