

<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" value="{{ isset($docente->nombre)?$docente->nombre:'' }}" id="Nombre">
<br>
<label for="Profesion">Profesion</label>
<input type="text" name="Profesion" value="{{ isset($docente->profesion)?$docente->profesion:'' }}" id="Profesion">
<br>
<label for="Enviar">Enviar</label>
<input class="btn btn-info" type="submit" value="Guardar datos">

<a class="btn btn-danger" href="{{ url('/docente') }}">Regresar</a>