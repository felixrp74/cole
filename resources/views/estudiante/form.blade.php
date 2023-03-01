formulario 

<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" value="{{ isset($estudiante->nombre)?$estudiante->nombre:'' }}" id="Nombre">
<br>
<label for="Enviar">Enviar</label>
<input class="btn btn-info" type="submit" value="Guardar datos">

<a class="btn btn-danger" href="{{ url('/estudiante') }}">Regresar</a>