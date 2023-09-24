<form action="{{ url('/estudiante') }}" method="POST" enctype="multipart/form-data" >
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
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{  old('dni')  }}" id="nombre">
                    @error('nombre')
                    <small>
                        <strong>{{$message}}</strong>
                    </small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
                <div class="col-sm-8">
                    <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{  old('dni')  }}" id="apellido_paterno">
                    @error('apellido_paterno')
                    <small>
                        <strong>{{$message}}</strong>
                    </small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
                <div class="col-sm-8">
                    <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{  old('dni')  }}" id="apellido_materno">
                    @error('apellido_materno')
                    <small>
                        <strong>{{$message}}</strong>
                    </small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="fecha_nacimiento" class="col-sm-4 col-form-label">Fecha de nacimiento</label>
                <div class="col-sm-8">
                    <input type="date" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value="{{  old('dni')  }}" id="fecha_nacimiento">
                    @error('fecha_nacimiento')
                    <small>
                        <strong>{{$message}}</strong>
                    </small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="lugar_nacimiento" class="col-sm-4 col-form-label">Lugar de nacimiento</label>
                <div class="col-sm-8">
                    <input type="text" name="lugar_nacimiento" class="form-control @error('lugar_nacimiento') is-invalid @enderror" value="{{  old('dni')  }}" id="lugar_nacimiento">
                    @error('lugar_nacimiento')
                    <small>
                        <strong>{{$message}}</strong>
                    </small>
                    @enderror
                </div>
            </div>

        </div> 
        
        <div class="col-sm-6">

            <div class="form-group row">
                <label for="genero" class="col-sm-4 col-form-label">Genero</label>
                <div class="col-sm-8">
                    <select type="text" name="genero" class="form-control" value="{{  old('dni')   }}" id="genero">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="direccion_actual" class="col-sm-4 col-form-label">Direccion</label>
                <div class="col-sm-8">
                    <input type="text" name="direccion_actual" class="form-control @error('direccion_actual') is-invalid @enderror" value="{{  old('dni')  }}" id="direccion_actual">
                    @error('direccion_actual')
                    <small>
                        <strong>{{$message}}</strong>
                    </small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="celular" class="col-sm-4 col-form-label">Celular</label>
                <div class="col-sm-8">
                    <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{  old('dni') }}" id="celular">
                    @error('celular')
                    <small>
                        <strong>{{$message}}</strong>
                    </small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{  old('dni') }}" id="email">
                    @error('email')
                    <small>
                        <strong>{{$message}}</strong>
                    </small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{  old('dni')  }}" id="password">
                    @error('password')
                    <small>
                        <strong>{{$message}}</strong>
                    </small>
                    @enderror
                </div>
            </div> 

            <div class="form-group row">
                {!! Form::label('documento', 'Documento para publicacion', ['class' => 'col-sm-4 col-form-label']) !!}
                <div class="col-sm-8">
                {!! Form::file('documento', ['class' => "form-control"]) !!}
               
                </div>
            </div> 
            
            <h6>Unir los 3 PDF y subir un unico archivo:</h6>
            <ul>
                <li>copia Dni</li>
                <li>copia Partida Nacimiento</li>
                <li>copia Certificado de estudios (primaria)</li>
            </ul>
 
            
            <input class="btn btn-info" type="submit" value="Guardar datos">

        </div>
    </div>
    
</form>