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

 

    @if ($docentes_asignados)
    <div id="imp1" class="d-flex justify-content-center">
        <div class="card"> 
            <div class="card-body">
            <input type="button" class="btn btn-info" value="PRINT" id="printbutton" onclick="javascript:imprim1(imp1);">
            </div>
        </div>
    </div>
    @endif

    @if ($docentes_asignados)

    
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
    <h1 class="centro pl-5">REPORTE DOCENTES Y SUS CURSOS</h1>
    <br> 

    <br>
    <br>
    <div class="row"> 
        
    </div>

    {{-- cuerpo tabla --}}
    <div class="card-body">
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <td colspan="3">Docente</td>
                    <td colspan="5">Perfil académico</td>
                </tr>
                <tr>   
                    <td ># </td>
                    <td >Nombre </td>
                    <td >Paterno </td>
                    <td >Fecha de asignación </td>
                    <td >Curso </td>
                    <td >Grado </td>
                    <td >Sección</td>
                </tr>
            </thead>
            <tbody>

                <input type="hidden" value="{{ $i = 1}}">

                @foreach( $docentes_asignados as $reporte )
                <tr>  
                    <td >{{ $i++ }}</td> 
                    <td >{{ $reporte->nombre }}</td> 
                    <td >{{ $reporte->apellido_paterno }}</td> 
                    <td >{{ $reporte->fecha_asignacion }}</td> 
                    <td >{{ $reporte->descripcion }}</td> 
                    <td >{{ $reporte->grado }}</td> 
                    <td >{{ $reporte->seccion }}</td> 
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
    
 