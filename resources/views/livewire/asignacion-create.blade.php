<div class="card">

    <div class="card-body">


        <form action="{{ url('/asignacion') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="row">

                <div class="col-sm-6">

                    <div class="form-group row">
                        <label for="dni" class="col-sm-4 col-form-label">DNI</label>
                        <div class="col-sm-8">
                            <input wire:model="search" class="form-control" value="10293847"  placeholder="Buscar por DNI del docente" type="text">
                        </div>
                    </div>

                    @if ($docente)
                        <input type="hidden" name="IdDocente" id="IdDocente" value="{{$docente->iddocente}}">
                        
                        <div class="form-group row">
                            <label for="Nombre" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" name="Nombre" class="form-control" value="{{ isset($docente->nombre)?$docente->nombre:'' }}" id="Nombre">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
                            <div class="col-sm-8">
                                <input type="text" name="apellido_paterno" class="form-control" value="{{ isset($docente->apellido_paterno)?$docente->apellido_paterno:'' }}" id="apellido_paterno">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
                            <div class="col-sm-8">
                                <input type="text" name="apellido_materno" class="form-control" value="{{ isset($docente->apellido_materno)?$docente->apellido_materno:'' }}" id="apellido_materno">
                            </div>
                        </div>
                    @else 
                        <h4>No se tiene registro del docente en la BASE DATOS...</h4>
                    @endif
                </div>                    
            

                <div class="col-sm-6">

                    <div class="form-group row">
                        <label for="seccion" class="col-sm-4 col-form-label">Seccion</label>
                        <div class="col-sm-8">
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
                        <label for="grado" class="col-sm-4 col-form-label">Grado</label>
                        <div class="col-sm-8">
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
                        <label for="anio_academico" class="col-sm-4 col-form-label">Año académico</label>
                        <div class="col-sm-8">
                            <select name="anio_academico" class="form-control" id="anio_academico">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="especialidad" class="col-sm-4 col-form-label">Especialidad</label>
                        <div class="col-sm-8">
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
                        <label for="Curso" class="col-sm-4 col-form-label">Curso</label>
                        <div class="col-sm-8">
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
                        <label for="" class="col-sm-4 col-form-label">Enviar</label>
                        <div class="col-sm-8">
                            <input class="btn btn-info" type="submit" value="Guardar datos">
                        </div>
                    </div>

                </div>

            </div>

        </form>


    </div>
</div>