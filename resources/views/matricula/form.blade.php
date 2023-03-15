<input type="hidden" name="idestudiante" value="{{ isset($reportematricula[0]->idestudiante)?$reportematricula[0]->idestudiante:'' }}" id="idestudiante">
<input type="hidden" name="idmatricula" value="{{ isset($reportematricula[0]->idmatricula)?$reportematricula[0]->idmatricula:'' }}" id="idmatricula">

<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" value="{{ isset($reportematricula[0]->nombre)?$reportematricula[0]->nombre:'' }}" id="Nombre" disabled>
<br>
<label for="apellido_paterno">Paterno</label>
<input type="text" name="apellido_paterno" value="{{ isset($reportematricula[0]->apellido_paterno)?$reportematricula[0]->apellido_paterno:'' }}" id="apellido_paterno" disabled>
<br>
<label for="apellido_materno">Paterno</label>
<input type="text" name="apellido_materno" value="{{ isset($reportematricula[0]->apellido_materno)?$reportematricula[0]->apellido_materno:'' }}" id="apellido_materno" disabled>
<br>

 

<label for="seccion">Seccion</label>
{{-- <input type="text" name="seccion" id="seccion" value="C"> --}}
<select name="seccion" id="seccion">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <option value="E">E</option>
</select>
<br>

<label for="grado">Grado</label>
{{-- <input type="text" name="grado" id="grado" value="1"> --}}
<select name="grado" id="grado">
    <option value="1">PRIMERO</option>
    <option value="2">SEGUNDO</option>
    <option value="3">TERCERO</option>
    <option value="4">TERCERO</option>
    <option value="5">TERCERO</option>
</select>
<br>

<label for="anio_academico">Año académico</label>
{{-- <input type="text" name="anio_academico" id="anio_academico" value="1"> --}}
<select name="anio_academico" id="anio_academico">
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
</select>
<br>

<label for="especialidad">Especialidad</label>
{{-- <input type="text" name="especialidad" id="especialidad" value="AUTOMOTRIZ"> --}}
<select name="especialidad" id="especialidad">
    <option value="AIP - ROBÓTICA">AIP - ROBÓTICA</option>
    <option value="COMPUTACIÓN">COMPUTACIÓN</option>
    <option value="CONSTRUCCIÓN CIVIL">CONSTRUCCIÓN CIVIL</option>
    <option value="COSMETOLOGÍA">COSMETOLOGÍA</option>
    <option value="ELECTRICIDAD">ELECTRICIDAD</option>
    <option value="ELECTRÓNICA">ELECTRÓNICA</option>
    <option value="INDUSTRIA ALIMENTARIA">INDUSTRIA ALIMENTARIA</option>
    <option value="INDUSTRIA TEXTIL">INDUSTRIA TEXTIL</option>
    <option value="INDUSTRIA DEL VESTIDO">INDUSTRIA DEL VESTIDO</option>
</select>
<br>


<label for="Enviar">Enviar</label>
<input type="submit" class="btn btn-info" value="Guardar datos">

<a class="btn btn-danger" href="{{ url('/matricula') }}">Regresar</a>