@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRAR DE DOCENTES</h1>
@stop

@section('content')

<div>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
   

        {{-- cuerpo tabla --}}
        <div class="card-body">
            <form action="{{ url('/docente') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row"> 

                <div class="col-sm-6">
 
                <div class="form-group row">
                    <label for="dni" class="col-sm-4 col-form-label">DNI</label>
                    <div class="col-sm-8">
                        <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror" value="{{  old('dni') }}" id="dni" placeholder="Ej. 67346733">
                        @error('dni')
                        <small>
                            <strong>{{$message}}</strong>
                        </small>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" id="nombre" placeholder="Ej. Antony">
                        @error('nombre')
                        <small>
                            <strong>{{$message}}</strong>
                        </small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="profesion" class="col-sm-4 col-form-label">Profesion</label>
                    <div class="col-sm-8">
                        <input type="text" name="profesion" class="form-control @error('profesion') is-invalid @enderror" value="{{ old('profesion') }}" id="profesion" placeholder="Ej. Docente">
                        @error('profesion')
                        <small>
                            <strong>{{$message}}</strong>
                        </small>
                        @enderror
                    </div>
                </div>
    
                
                <div class="form-group row">
                    <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
                    <div class="col-sm-8">
                        <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno') }}" id="apellido_paterno" placeholder="Ej. Mamani">
                        @error('apellido_paterno')
                        <small>
                            <strong>{{$message}}</strong>
                        </small>
                        @enderror
                    </div>
                </div>
        

                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
                        <div class="col-sm-8">
                            <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno') }}" id="apellido_materno" placeholder="Ej. Quispe">
                        </div>
                        @error('apellido_materno')
                        <small>
                            <strong>{{$message}}</strong>
                        </small>
                        @enderror
                    </div>
            
                    <div class="form-group row">
                        <label for="celular" class="col-sm-4 col-form-label">Celular</label>
                        <div class="col-sm-8">
                            <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{ old('celular') }}" id="celular" placeholder="Ej. 987789456">
                        </div>
                        @error('celular')
                        <small>
                            <strong>{{$message}}</strong>
                        </small>
                        @enderror
                    </div>
                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="Ej. antony@gmail.com">
                        </div>
                        @error('email')
                        <small>
                            <strong>{{$message}}</strong>
                        </small>
                        @enderror
                    </div>
                    
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password">
                        </div>
                        @error('password')
                        <small>
                            <strong>{{$message}}</strong>
                        </small>
                        @enderror
                    </div>  
                    
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Enviar</label>
                        <div class="col-sm-8">
                            <input class="btn btn-info" type="submit" value="Guardar datos">
                        </div>
                    </div>  
                </div>
            </div>
           
            


            </form>
        </div>

        <div class="card-footer">
            
        </div> 
 
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop