
<form action="{{ url('/estudiante/'.$estudiante->idestudiante) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }} 

    <label for="Dni">Dni</label>
    <input type="text" name="dni" value="{{ isset($estudiante->dni)?$estudiante->dni:'' }}" id="dni">
    <br>
    <label for="Nombre">Nombre</label>
    <input type="text" name="nombre" value="{{ isset($estudiante->nombre)?$estudiante->nombre:'' }}" id="nombre">
    <br>
    <label for="Apellido Paterno">Apellido Paterno</label>
    <input type="text" name="apellido_paterno" value="{{ isset($estudiante->apellido_paterno)?$estudiante->apellido_paterno:'' }}" id="apellido_paterno">
    <br>
    <label for="Apellido Materno">Apellido Materno</label>
    <input type="text" name="apellido_materno" value="{{ isset($estudiante->apellido_materno)?$estudiante->apellido_materno:'' }}" id="apellido_materno">
    <br>
    <label for="Fecha de nacimiento">Fecha de nacimiento</label>
    <input type="date" name="fecha_nacimiento" value="{{ isset($estudiante->fecha_nacimiento)?$estudiante->fecha_nacimiento:'' }}" id="fecha_nacimiento">
    <br>
    <label for="Lugar de nacimiento">Lugar de nacimiento</label>
    <input type="text" name="lugar_nacimiento" value="{{ isset($estudiante->lugar_nacimiento)?$estudiante->lugar_nacimiento:'' }}" id="lugar_nacimiento">
    <br>
    <label for="Genero">Genero</label>
    <input type="text" name="genero" value="{{ isset($estudiante->genero)?$estudiante->genero:'' }}" id="genero">
    <br>
    <label for="Direccion">Direccion</label>
    <input type="text" name="direccion_actual" value="{{ isset($estudiante->direccion_actual)?$estudiante->direccion_actual:'' }}" id="direccion_actual">
    <br>
    <label for="Celular">Celular</label>
    <input type="text" name="celular" value="{{ isset($estudiante->celular)?$estudiante->celular:'' }}" id="celular">
    <br>
    <label for="Email">Email</label>
    <input type="text" name="email" value="{{ isset($estudiante->email)?$estudiante->email:'' }}" id="email">
    <br>
    <label for="Password">Password</label>
    <input type="text" name="password" value="{{ isset($estudiante->password)?$estudiante->password:'' }}" id="password">
    <br>
    <h4>Datos de apoderado</h4>
    
    <label for="genero_apoderado">Genero</label>
    <select type="text" name="genero_apoderado" id="genero_apoderado">
        <option value="PADRE">Masculino</option>
        <option value="MADRE">Femenino</option>
    </select>
    <br>
    <label for="dni_apoderado">DNI </label>
    <input type="text" name="dni_apoderado" id="dni_apoderado" value="{{ isset($apoderado->dni_apoderado)?$apoderado->dni_apoderado:'' }}">
    <br>
    <label for="nombre_apoderado">Nombre</label>
    <input type="text" name="nombre_apoderado" id="nombre_apoderado" value="{{ isset($apoderado->nombre_apoderado)?$apoderado->nombre_apoderado:'' }}">
    <br>
    <label for="apellido_paterno_apoderado">Apellido paterno</label>
    <input type="text" name="apellido_paterno_apoderado" id="apellido_paterno_apoderado" value="{{ isset($apoderado->apellido_paterno_apoderado)?$apoderado->apellido_paterno_apoderado:'' }}">
    <br>
    <label for="apellido_materno_apoderado">Apellido materno</label>
    <input type="text" name="apellido_materno_apoderado" id="apellido_materno_apoderado" value="{{ isset($apoderado->apellido_materno_apoderado)?$apoderado->apellido_materno_apoderado:'' }}">
    <br>
    <label for="fecha_nacimiento_apoderado">Fecha de nacimiento</label>
    <input type="date" name="fecha_nacimiento_apoderado" id="fecha_nacimiento_apoderado" value="{{ isset($apoderado->fecha_nacimiento_apoderado)?$apoderado->fecha_nacimiento_apoderado:'' }}">
    <br>
    <label for="lugar_nacimiento_apoderado">Lugar de nacimiento</label>
    <input type="text" name="lugar_nacimiento_apoderado" id="lugar_nacimiento_apoderado" value="{{ isset($apoderado->lugar_nacimiento_apoderado)?$apoderado->lugar_nacimiento_apoderado:'' }}">
    {{-- <label for="vive_apoderado">Vive Apoderado</label> --}}
    <input type="hidden" name="vive_apoderado" id="vive_apoderado" value="SI">
    <br>
    <label for="direccion_actual_apoderado">Direccion actual</label>
    <input type="text" name="direccion_actual_apoderado" id="direccion_actual_apoderado" value="{{ isset($apoderado->direccion_actual_apoderado)?$apoderado->direccion_actual_apoderado:'' }}">
    <br>
    <label for="email_apoderado">email_apoderado</label>
    <input type="text" name="email_apoderado" id="email_apoderado" value="{{ isset($apoderado->email_apoderado)?$apoderado->email_apoderado:'' }}">
    <br>
    <label for="grado_instruccion_apoderado">Grado de instruccion</label>
    <input type="text" name="grado_instruccion_apoderado" id="grado_instruccion_apoderado" value="{{ isset($apoderado->grado_instruccion_apoderado)?$apoderado->grado_instruccion_apoderado:'' }}">
    <br>
    <label for="ocupacion_apoderado">Ocupacion</label>
    <input type="text" name="ocupacion_apoderado" id="ocupacion_apoderado" value="{{ isset($apoderado->ocupacion_apoderado)?$apoderado->ocupacion_apoderado:'' }}">
    <br>
    <label for="estado_civil_apoderado">Estado civil</label>
    <input type="text" name="estado_civil_apoderado" id="estado_civil_apoderado" value="{{ isset($apoderado->estado_civil_apoderado)?$apoderado->estado_civil_apoderado:'' }}">
    <br>
    <label for="celular_apoderado">Celular</label>
    <input type="text" name="celular_apoderado" id="celular_apoderado" value="{{ isset($apoderado->celular_apoderado)?$apoderado->celular_apoderado:'' }}">
    <br>
    <label for="Enviar">Enviar</label>
    <input class="btn btn-info" type="submit" value="Guardar datos">

    <a class="btn btn-danger" href="{{ url('/estudiante') }}">Regresar</a>
 
</form>