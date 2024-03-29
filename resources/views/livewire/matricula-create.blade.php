<form action="{{ url('/matricula') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div class="row">

        <div class="col-sm-6">

            <div class="form-group row">
                <label for="dni" class="col-sm-4 col-form-label">DNI</label>
                <div class="col-sm-8">
                    <input wire:model="search" class="form-control" value="10293847"  placeholder="buscar por DNI" type="text">
                </div> 
            </div>


            @if ($estudiante) 
                <input type="hidden" name="idestudiante" id="idestudiante" value="{{$estudiante->idestudiante}}">

                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" name="nombre" class="form-control" value="{{ isset($estudiante->nombre)?$estudiante->nombre:'' }}" id="nombre">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
                    <div class="col-sm-8">
                        <input type="text" name="apellido_paterno" class="form-control" value="{{ isset($estudiante->apellido_paterno)?$estudiante->apellido_paterno:'' }}" id="apellido_paterno">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
                    <div class="col-sm-8">
                        <input type="text" name="apellido_materno" class="form-control" value="{{ isset($estudiante->apellido_materno)?$estudiante->apellido_materno:'' }}" id="apellido_materno">
                    </div>
                </div>


            @else 
                    <h4>No se tiene registro del estudiante en la BASE DATOS...</h4>
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
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
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
                <label for="" class="col-sm-4 col-form-label">Enviar</label>
                <div class="col-sm-8">
                    <input class="btn btn-info" type="submit" value="Guardar datos">
                </div>
            </div>
    
        </div>

    </div>

</form>


 