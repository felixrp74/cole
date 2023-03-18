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
    {{-- file --}}
    <div class="row mb-3"> 
        <div class="col">
            <div class="form-group">
                {!! Form::label('documento', 'Unir') !!}
                {!! Form::file('documento', ['class' => 'form-control-file']) !!}
            </div>
            <p>Unir los tres archivos en un solo PDF.</p>
            <ul>
                <li>copia Dni</li>
                <li>copia Partida Nacimiento</li>
                <li>copia Certificado de estudios (primaria)</li>
            </ul> 
        </div>
    </div>

    <label for="Email">Email</label>
    <input type="text" name="email" id="Email">
    <br>
    <label for="Password">Contrasena</label>
    <input type="text" name="password" id="password">
    <br> 

     
    <input class="btn btn-info" type="submit" value="Guardar datos">
    
</form>