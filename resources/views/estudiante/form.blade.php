
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
<input type="text" name="fecha_nacimiento" value="{{ isset($estudiante->fecha_nacimiento)?$estudiante->fecha_nacimiento:'' }}" id="fecha_nacimiento">
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
<label for="Enviar">Enviar</label>
<input class="btn btn-info" type="submit" value="Guardar datos">

<a class="btn btn-danger" href="{{ url('/estudiante') }}">Regresar</a>