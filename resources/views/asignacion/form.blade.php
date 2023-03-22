{{-- {{ dd($reporteasignacion[0]->seccion) }} --}}

<input type="hidden" name="iddocente" value="{{ isset($reporteasignacion[0]->iddocente)?$reporteasignacion[0]->iddocente:'' }}" id="iddocente">
<input type="hidden" name="idasignacion" value="{{ isset($reporteasignacion[0]->idasignacion)?$reporteasignacion[0]->idasignacion:'' }}" id="idasignacion">
 
 
<div class="form-group row">
    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
        {{-- <input type="text" name="dni" class="form-control" value="{{ isset($reporteasignacion[0]->dni)?$reporteasignacion[0]->dni:'' }}" id="dni"> --}}
        <input type="text" name="nombre" readonly class="form-control" value="{{ isset($reporteasignacion[0]->nombre)?$reporteasignacion[0]->nombre:'' }}" id="nombre">
    </div>
</div>

<div class="form-group row">
    <label for="apellido_paterno" class="col-sm-2 col-form-label">Apellido paterno</label>
    <div class="col-sm-10">
        <input type="text" name="apellido_paterno" readonly class="form-control" value="{{ isset($reporteasignacion[0]->apellido_paterno)?$reporteasignacion[0]->apellido_paterno:'' }}" id="apellido_paterno">
    </div>
</div>

<div class="form-group row">
    <label for="apellido_materno" class="col-sm-2 col-form-label">Apellido materno</label>
    <div class="col-sm-10">
        <input type="text" name="apellido_materno" readonly class="form-control" value="{{ isset($reporteasignacion[0]->apellido_materno)?$reporteasignacion[0]->apellido_materno:'' }}" id="apellido_materno">
    </div>
</div>
 
<div class="form-group row">
    <label for="seccion" class="col-sm-2 col-form-label">Seccion</label>
    <div class="col-sm-10">
        <select name="seccion" class="form-control" id="seccion">
            {{-- {{echo $reporteasignacion[0]->grado }} --}}
            @if(isset($reporteasignacion[0]->seccion))
                <option value="{{$reporteasignacion[0]->seccion}}">{{$reporteasignacion[0]->seccion}}</option>
            @endif
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
    <label for="Curso" class="col-sm-2 col-form-label">Curso</label>
    <div class="col-sm-10">
    <select name="Curso" class="form-control" id="Curso">
        <option value="ARTE">ARTE</option>
        <option value="CIENCIA TECNOLOGÍA Y AMBIENTE">CIENCIA TECNOLOGÍA Y AMBIENTE</option>
        <option value="COMUNICACIÓN">COMUNICACIÓN</option>
        <option value="FORMACION CIUDADANA Y CÍVICA">FORMACION CIUDADANA Y CÍVICA</option>
        <option value="INGLÉS">INGLÉS</option>
        <option value="EDUCACIÓN FÍSICA">EDUCACIÓN FÍSICA</option>
        <option value="EDUCACIÓN RELIGIOSA">EDUCACIÓN RELIGIOSA</option>
        <option value="HISTORIA GEOGRAFÍA Y ECONOMÍA">HISTORIA GEOGRAFÍA Y ECONOMÍA</option>
        <option value="MATEMÁTICA">MATEMÁTICA</option>
        <option value="PERSONA FAMILIA Y RELACIONES HUMANAS">PERSONA FAMILIA Y RELACIONES HUMANAS</option>
        <option value="EDUCACIÓN PARA EL TRABAJO">EDUCACIÓN PARA EL TRABAJO</option>

    </select>
    </div>
</div>

<div class="form-group row">
    <label for="Enviar" class="col-sm-2 col-form-label">Enviar</label>
    <div class="col-sm-10">
        <input type="submit" class="btn btn-info" value="Guardar datos">
        <a class="btn btn-danger" href="{{ url('/asignacion') }}">Regresar</a>
    </div>
</div>
 