<form action="{{ url('/estudiante') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    
    <label for="Dni">Dni</label>
    <input type="text" name="dni" id="Dni">
    <br>
    <label for="Nombre">Nombre</label>
    <input type="text" name="nombre" id="Nombre">
    <br>
    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" name="apellido_paterno" id="ApellidoPaterno">
    <br>
    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" name="apellido_materno" id="ApellidoMaterno">
    <br>
    <label for="FechaNacimiento">Fecha Nacimiento</label>
    <input type="date" name="fecha_nacimiento" id="FechaNacimiento">
    <br>
    <label for="LugarNacimiento">Lugar Nacimiento</label>
    <input type="text" name="lugar_nacimiento" id="LugarNacimiento">
    <br>
    <label for="Genero">Genero</label>
    <select type="text" name="genero" id="Genero">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select>
    <br>
    <label for="DireccionActual">Direccion Actual</label>
    <input type="text" name="direccion_actual" id="DireccionActual">
    <br>
    <label for="Celular">Celular</label>
    <input type="text" name="celular" id="Celular">
    <br>
    <label for="Email">Email</label>
    <input type="text" name="email" id="Email">
    <br>
    <label for="Password">Contrasena</label>
    <input type="text" name="password" id="password">
    <br>

    <label for="Vive">Vive</label>
    <select name="" wire:model="vive" id="">
        <option value="true">Si</option>
        <option value="false">No</option>
    </select>

    @if($vive == 'false')
    <input type="hidden" name="vive_apoderado" id="vive_apoderado" value="NO">
    @endif
    
    <br>
    -----------------------------------------------------------------------------------
    <br>
    @if($vive == 'true')
    <h4>Datos de apoderado</h4>
    
    <label for="genero_apoderado">Genero</label>
    <select type="text" name="genero_apoderado" id="genero_apoderado">
        <option value="PADRE">Masculino</option>
        <option value="MADRE">Femenino</option>
    </select>
    <br>
    <label for="dni_apoderado">DNI </label>
    <input type="text" name="dni_apoderado" id="dni_apoderado">
    <br>
    <label for="nombre_apoderado">Nombre</label>
    <input type="text" name="nombre_apoderado" id="nombre_apoderado">
    <br>
    <label for="apellido_paterno_apoderado">Apellido paterno</label>
    <input type="text" name="apellido_paterno_apoderado" id="apellido_paterno_apoderado">
    <br>
    <label for="apellido_materno_apoderado">Apellido materno</label>
    <input type="text" name="apellido_materno_apoderado" id="apellido_materno_apoderado">
    <br>
    <label for="fecha_nacimiento_apoderado">Fecha de nacimiento</label>
    <input type="date" name="fecha_nacimiento_apoderado" id="fecha_nacimiento_apoderado">
    <br>
    <label for="lugar_nacimiento_apoderado">Lugar de nacimiento</label>
    <input type="text" name="lugar_nacimiento_apoderado" id="lugar_nacimiento_apoderado">
    {{-- <label for="vive_apoderado">Vive Apoderado</label> --}}
    <input type="hidden" name="vive_apoderado" id="vive_apoderado" value="SI">
    <br>
    <label for="direccion_actual_apoderado">Direccion actual</label>
    <input type="text" name="direccion_actual_apoderado" id="direccion_actual_apoderado">
    <br>
    <label for="email_apoderado">email_apoderado</label>
    <input type="text" name="email_apoderado" id="email_apoderado">
    <br>
    <label for="grado_instruccion_apoderado">Grado de instruccion</label>
    <input type="text" name="grado_instruccion_apoderado" id="grado_instruccion_apoderado">
    <br>
    <label for="ocupacion_apoderado">Ocupacion</label>
    <input type="text" name="ocupacion_apoderado" id="ocupacion_apoderado">
    <br>
    <label for="estado_civil_apoderado">Estado civil</label>
    <input type="text" name="estado_civil_apoderado" id="estado_civil_apoderado">
    <br>
    <label for="celular_apoderado">Celular</label>
    <input type="text" name="celular_apoderado" id="celular_apoderado">
    <br>
    <label for="estudiantes_idestudiante">estudiantes_idestudiante</label>
    <input type="text" name="estudiantes_idestudiante" id="estudiantes_idestudiante">
    <br>
    

    @endif

    <input class="btn btn-info" type="submit" value="Guardar datos">
    
    </form>