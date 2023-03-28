<input type="hidden" name="idestudiante" value="{{ isset($reportematricula[0]->idestudiante)?$reportematricula[0]->idestudiante:'' }}" id="idestudiante">
<input type="hidden" name="idmatricula" value="{{ isset($reportematricula[0]->idmatricula)?$reportematricula[0]->idmatricula:'' }}" id="idmatricula">
 
 
<div class="form-group row">
    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
        {{-- <input type="text" name="dni" class="form-control" value="{{ isset($reportematricula[0]->dni)?$reportematricula[0]->dni:'' }}" id="dni"> --}}
        <input type="text" name="nombre" class="form-control" value="{{ isset($reportematricula[0]->nombre)?$reportematricula[0]->nombre:'' }}" id="nombre">
    </div>
</div>

<div class="form-group row">
    <label for="apellido_paterno" class="col-sm-2 col-form-label">Apellido paterno</label>
    <div class="col-sm-10">
        <input type="text" name="apellido_paterno" class="form-control" value="{{ isset($reportematricula[0]->apellido_paterno)?$reportematricula[0]->apellido_paterno:'' }}" id="apellido_paterno">
    </div>
</div>

<div class="form-group row">
    <label for="apellido_materno" class="col-sm-2 col-form-label">Apellido materno</label>
    <div class="col-sm-10">
        <input type="text" name="apellido_materno" class="form-control" value="{{ isset($reportematricula[0]->apellido_materno)?$reportematricula[0]->apellido_materno:'' }}" id="apellido_materno">
    </div>
</div>
 

<div class="form-group row">
    <label for="seccion" class="col-sm-2 col-form-label">Seccion</label>
    <div class="col-sm-10">
        <select name="seccion" class="form-control" id="seccion">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="grado" class="col-sm-2 col-form-label">Grado</label>
    <div class="col-sm-10">
        <select name="grado" class="form-control" id="grado">
            <option value="1">PRIMERO</option>
            <option value="2">SEGUNDO</option>
            <option value="3">TERCERO</option>
            <option value="4">CUARTO</option>
            <option value="5">QUINTO</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="anio_academico" class="col-sm-2 col-form-label">Año académico</label>
    <div class="col-sm-10">
        <select name="anio_academico" class="form-control" id="anio_academico">
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="especialidad" class="col-sm-2 col-form-label">Especialidad</label>
    <div class="col-sm-10">
        <select name="especialidad" class="form-control" id="especialidad">
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
    </div>
</div>

<div class="form-group row">
    <label for="Enviar" class="col-sm-2 col-form-label">Enviar</label>
    <div class="col-sm-10">
        <input type="submit" class="btn btn-info" value="Guardar datos">
        <a class="btn btn-danger" href="{{ url('/matricula') }}">Regresar</a>
    </div>
</div>
 