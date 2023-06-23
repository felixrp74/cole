    <div class="form-group row">
        <label for="dni" class="col-sm-2 col-form-label">DNI</label>
        <div class="col-sm-10">
            <input type="text" name="dni" class="form-control" value="{{ isset($docente->dni)?$docente->dni:'' }}" id="dni">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" value="{{ isset($docente->nombre)?$docente->nombre:'' }}" id="nombre">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="profesion" class="col-sm-2 col-form-label">Profesion</label>
        <div class="col-sm-10">
            <input type="text" name="profesion" class="form-control" value="{{ isset($docente->profesion)?$docente->profesion:'' }}" id="profesion">
        </div>
    </div>

    
    <div class="form-group row">
        <label for="apellido_paterno" class="col-sm-2 col-form-label">Apellido paterno</label>
        <div class="col-sm-10">
            <input type="text" name="apellido_paterno" class="form-control" value="{{ isset($docente->apellido_paterno)?$docente->apellido_paterno:'' }}" id="apellido_paterno">
        </div>
    </div>

    
    <div class="form-group row">
        <label for="apellido_materno" class="col-sm-2 col-form-label">Apellido materno</label>
        <div class="col-sm-10">
            <input type="text" name="apellido_materno" class="form-control" value="{{ isset($docente->apellido_materno)?$docente->apellido_materno:'' }}" id="apellido_materno">
        </div>
    </div>

    <div class="form-group row">
        <label for="celular" class="col-sm-2 col-form-label">Celular</label>
        <div class="col-sm-10">
            <input type="text" name="celular" class="form-control" value="{{ isset($docente->celular)?$docente->celular:'' }}" id="celular">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" value="{{ isset($docente->email)?$docente->email:'' }}" id="email">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="text" name="password" class="form-control" value="{{ isset($docente->password)?$docente->password:'' }}" id="password">
        </div>
    </div>  
    
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Enviar</label>
        <div class="col-sm-10">
            <input class="btn btn-info" type="submit" value="Guardar datos">
            <a class="btn btn-danger" href="{{ url('/docente') }}">Regresar</a>
        </div>
    </div>  
    
    