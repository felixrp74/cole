<form action="{{ url('/estudiante') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div class="row">

        <div class="col-sm-6">
        
            <div class="form-group row">
                <label for="dni" class="col-sm-4 col-form-label">DNI</label>
                <div class="col-sm-8">
                    <input type="text" name="dni" class="form-control" value="{{ isset($estudiante->dni)?$estudiante->dni:'' }}" id="dni">
                </div>
            </div>

            <div class="form-group row">
                <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    {{-- <input type="text" name="dni" class="form-control" value="{{ isset($estudiante->dni)?$estudiante->dni:'' }}" id="dni"> --}}
                    <input type="text" name="nombre" class="form-control" value="{{ isset($estudiante->nombre)?$estudiante->nombre:'' }}" id="nombre">
                </div>
            </div>

            <div class="form-group row">
                <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
                <div class="col-sm-8">
                    <input type="text" name="apellido_paterno" class="form-control" value="{{ isset($estudiante->apellido_paterno)?$estudiante->apellido_paterno:'' }}" id="apellido_paterno">
                </div>
            </div>

            <div class="form-group row">
                <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
                <div class="col-sm-8">
                    <input type="text" name="apellido_materno" class="form-control" value="{{ isset($estudiante->apellido_materno)?$estudiante->apellido_materno:'' }}" id="apellido_materno">
                </div>
            </div>

            <div class="form-group row">
                <label for="fecha_nacimiento" class="col-sm-4 col-form-label">Fecha de nacimiento</label>
                <div class="col-sm-8">
                    <input type="date" name="fecha_nacimiento" class="form-control" value="{{ isset($estudiante->fecha_nacimiento)?$estudiante->fecha_nacimiento:'' }}" id="fecha_nacimiento">
                </div>
            </div>

            <div class="form-group row">
                <label for="lugar_nacimiento" class="col-sm-4 col-form-label">Lugar de nacimiento</label>
                <div class="col-sm-8">
                    <input type="text" name="lugar_nacimiento" class="form-control" value="{{ isset($estudiante->lugar_nacimiento)?$estudiante->lugar_nacimiento:'' }}" id="lugar_nacimiento">
                </div>
            </div>

        </div> 
        
        <div class="col-sm-6">

            <div class="form-group row">
                <label for="genero" class="col-sm-4 col-form-label">Genero</label>
                <div class="col-sm-8">
                    <select type="text" name="genero" class="form-control" value="{{ isset($estudiante->genero)?$estudiante->genero:'' }}" id="genero">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="direccion_actual" class="col-sm-4 col-form-label">Direccion</label>
                <div class="col-sm-8">
                    <input type="text" name="direccion_actual" class="form-control" value="{{ isset($estudiante->direccion_actual)?$estudiante->direccion_actual:'' }}" id="direccion_actual">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="celular" class="col-sm-4 col-form-label">Celular</label>
                <div class="col-sm-8">
                    <input type="text" name="celular" class="form-control" value="{{ isset($estudiante->celular)?$estudiante->celular:'' }}" id="celular">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" name="email" class="form-control" value="{{ isset($estudiante->email)?$estudiante->email:'' }}" id="email">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="text" name="password" class="form-control" value="{{ isset($estudiante->password)?$estudiante->password:'' }}" id="password">
                </div>
            </div> 

            <div class="form-group row">
                {!! Form::label('documento', 'Documento para publicacion', ['class' => 'col-sm-4 col-form-label']) !!}
                <div class="col-sm-8">
                {!! Form::file('documento', ['class' => 'form-control']) !!}
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