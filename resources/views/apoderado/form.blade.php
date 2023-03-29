
<form action="{{ url('/apoderado/'.$apoderado->idapoderado) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }} 

    <div class="form-group row">
        <label for="dni_apoderado" class="col-sm-2 col-form-label">DNI</label>
        <div class="col-sm-10">
            <input type="text" name="dni_apoderado" class="form-control" value="{{ isset($apoderado->dni_apoderado)?$apoderado->dni_apoderado:'' }}" id="dni_apoderado">
        </div>
    </div>

    <div class="form-group row">
        <label for="nombre_apoderado" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="nombre_apoderado" class="form-control" value="{{ isset($apoderado->nombre_apoderado)?$apoderado->nombre_apoderado:'' }}" id="nombre_apoderado">
        </div>
    </div>

    <div class="form-group row">
        <label for="apellido_paterno_apoderado" class="col-sm-2 col-form-label">Apellido paterno</label>
        <div class="col-sm-10">
            <input type="text" name="apellido_paterno_apoderado" class="form-control" value="{{ isset($apoderado->apellido_paterno_apoderado)?$apoderado->apellido_paterno_apoderado:'' }}" id="apellido_paterno_apoderado">
        </div>
    </div>

    <div class="form-group row">
        <label for="apellido_materno_apoderado" class="col-sm-2 col-form-label">Apellido materno</label>
        <div class="col-sm-10">
            <input type="text" name="apellido_materno_apoderado" class="form-control" value="{{ isset($apoderado->apellido_materno_apoderado)?$apoderado->apellido_materno_apoderado:'' }}" id="apellido_materno_apoderado">
        </div>
    </div>

    <div class="form-group row">
        <label for="fecha_nacimiento_apoderado" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
        <div class="col-sm-10">
            <input type="text" name="fecha_nacimiento_apoderado" class="form-control" value="{{ isset($apoderado->fecha_nacimiento_apoderado)?$apoderado->fecha_nacimiento_apoderado:'' }}" id="fecha_nacimiento_apoderado">
        </div>
    </div>

    <div class="form-group row">
        <label for="lugar_nacimiento_apoderado" class="col-sm-2 col-form-label">Lugar de nacimiento</label>
        <div class="col-sm-10">
            <input type="text" name="lugar_nacimiento_apoderado" class="form-control" value="{{ isset($apoderado->lugar_nacimiento_apoderado)?$apoderado->lugar_nacimiento_apoderado:'' }}" id="lugar_nacimiento_apoderado">
        </div>
    </div>

    <div class="form-group row">
        <label for="genero_apoderado" class="col-sm-2 col-form-label">Genero</label>
        <div class="col-sm-10">
            <select type="text" name="genero_apoderado" class="form-control" value="{{ isset($apoderado->genero_apoderado)?$apoderado->genero_apoderado:'' }}" id="genero_apoderado">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="direccion_actual_apoderado" class="col-sm-2 col-form-label">Direccion</label>
        <div class="col-sm-10">
            <input type="text" name="direccion_actual_apoderado" class="form-control" value="{{ isset($apoderado->direccion_actual_apoderado)?$apoderado->direccion_actual_apoderado:'' }}" id="direccion_actual_apoderado">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email_apoderado" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" name="email_apoderado" class="form-control" value="{{ isset($apoderado->email_apoderado)?$apoderado->email_apoderado:'' }}" id="email_apoderado">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="celular_apoderado" class="col-sm-2 col-form-label">Celular</label>
        <div class="col-sm-10">
            <input type="text" name="celular_apoderado" class="form-control" value="{{ isset($apoderado->celular_apoderado)?$apoderado->celular_apoderado:'' }}" id="celular_apoderado">
        </div>
    </div>
    
     

    <div class="form-group row">
        {!! Form::label('documento', 'Documento para publicacion', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
        {!! Form::file('documento', ['class' => 'form-control']) !!}
        </div>
    </div> 
    
    <h6>PDF y subir un unico archivo:</h6>
    <ul>
        <li>copia Dni</li> 
    </ul>
    

    <label for="Enviar">Enviar</label>
    <input class="btn btn-info" type="submit" value="Guardar datos">

    <a class="btn btn-danger" href="{{ url('/apoderado') }}">Regresar</a>
 
</form>