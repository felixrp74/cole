@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRO DE ADMINISTRADOR</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">

        <form action="{{ url('/apoderado') }}" method="POST" enctype="multipart/form-data" >
            @csrf
 
            <div class="card-body">
        
                <div class="row">
                    <div class="col-sm-12">
                        {{-- <h3>Datos de apoderado</h3> --}}
                    </div>
                </div>
        
                <div class="row">
        
                    <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="dni_apoderado" class="col-sm-4 col-form-label">DNI</label>
                            <div class="col-sm-8">
                                <input type="text" name="dni_apoderado" class="form-control" value="{{ isset($apoderado->dni_apoderado)?$apoderado->dni_apoderado:'' }}" id="dni_apoderado">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_materno_apoderado" class="col-sm-4 col-form-label">Apellido paterno</label>
                            <div class="col-sm-8">
                                <input type="text" name="apellido_materno_apoderado" class="form-control" value="{{ isset($apoderado->apellido_materno_apoderado)?$apoderado->apellido_materno_apoderado:'' }}" id="apellido_materno_apoderado">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label for="celular_apoderado" class="col-sm-4 col-form-label">Celular</label>
                            <div class="col-sm-8">
                                <input type="text" name="celular_apoderado" class="form-control" value="{{ isset($apoderado->celular_apoderado)?$apoderado->celular_apoderado:'' }}" id="celular_apoderado">
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="usuario" class="col-sm-4 col-form-label">Usuario</label>
                            <div class="col-sm-8">
                                <input type="text" name="usuario" class="form-control" value="{{ isset($apoderado->usuario)?$apoderado->usuario:'' }}" id="usuario">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="password" class="form-control" value="{{ isset($estudiante->password)?$estudiante->password:'' }}" id="password">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Repita su Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="password" class="form-control" value="{{ isset($estudiante->password)?$estudiante->password:'' }}" id="password">
                            </div>
                        </div> 
        
                    </div> 
                    
                    <div class="col-sm-6"> 
        
                        <div class="form-group row">
                            <label for="nombre_apoderado" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                {{-- <input type="text" name="dni" class="form-control" value="{{ isset($apoderado->dni)?$apoderado->dni:'' }}" id="dni"> --}}
                                <input type="text" name="nombre_apoderado" class="form-control" value="{{ isset($apoderado->nombre_apoderado)?$apoderado->nombre_apoderado:'' }}" id="nombre_apoderado">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="apellido_paterno_apoderado" class="col-sm-4 col-form-label">Apellido materno</label>
                            <div class="col-sm-8">
                                <input type="text" name="apellido_paterno_apoderado" class="form-control" value="{{ isset($apoderado->apellido_paterno_apoderado)?$apoderado->apellido_paterno_apoderado:'' }}" id="apellido_paterno_apoderado">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="email_apoderado" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" name="email_apoderado" class="form-control" value="{{ isset($apoderado->email_apoderado)?$apoderado->email_apoderado:'' }}" id="email_apoderado">
                            </div>
                        </div>         
                        
                         
        
                    </div>
                </div> 
        
                <input class="btn btn-info" type="submit" value="Guardar datos">
                    
            </div>
            
        </form>
         
        
            

        
    </div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $('#myOptions').change(function() {
            var val = $("#myOptions option:selected").text();
            
            const div = document.getElementById("section");

            let node = document.createElement('li');
            node.innerHTML = '<input type="checkbox"><label>Content typed by the user</label>  <input type="text"><button class="edit">Edit</button><button class="delete">Delete</button>';
            
            // alert(val);
            if(val == 'Si'){
                // alert('SIIIIIIIIIII');
                document.getElementById('section').appendChild(node);
            }else if(val == 'No'){
                // alert('noooooooooooo');
                // createElement
                const e = document.querySelector("");
                // remove the last list item
                e.parentElement.removeChild(e);
                document.getElementById('section').removeChild(node);
            }   



 
        });
    </script>
@stop

