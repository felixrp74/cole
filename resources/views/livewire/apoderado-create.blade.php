<div class="card-header">
    <div class="row">
 

        <div class="col-sm-6">

            <div class="form-group row">
                <label for="dni" class="col-sm-4 col-form-label">DNI estudiante</label>
                <div class="col-sm-6">
                    <input wire:model="search" class="form-control" value="10293847"  placeholder="buscar por DNI" type="text">
                </div>
            </div>

            @if ($estudiante) 
            <div class="form-group row">
                <label for="apellido_paterno" class="col-sm-4 col-form-label">Paterno Estudiante</label>
                <div class="col-sm-10">
                    <input type="text" name="apellido_paterno" class="form-control" value="{{ isset($estudiante->apellido_paterno)?$estudiante->apellido_paterno:'' }}" id="apellido_paterno">
                </div>
            </div>

        </div> 

        <div class="col-sm-6">
            
            <input type="hidden" name="idestudiante" id="idestudiante" value="{{$estudiante->idestudiante}}">

            <div class="form-group row">
                <label for="nombre" class="col-sm-4 col-form-label">Nombre Estudiante</label>
                <div class="col-sm-10">
                    <input type="text" name="nombre" class="form-control" value="{{ isset($estudiante->nombre)?$estudiante->nombre:'' }}" id="nombre">
                </div>
            </div>

        

            <div class="form-group row">
                <label for="apellido_materno" class="col-sm-4 col-form-label">Materno Estudiante</label>
                <div class="col-sm-10">
                    <input type="text" name="apellido_materno" class="form-control" value="{{ isset($estudiante->apellido_materno)?$estudiante->apellido_materno:'' }}" id="apellido_materno">
                </div>
            </div>


            @else 
                <h4>No se tiene registro del estudiante en la BASE DATOS...</h4>
            @endif


        </div>


    </div>
</div>
<div class="card-body">
    <form action="{{ url('/apoderado') }}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="row">

            <div class="col-sm-6">
    
                @if ($estudiante) 
                    <input type="hidden" name="idestudiante" id="idestudiante" value="{{$estudiante->idestudiante}}">
                @endif

                
                <div class="form-group row">
                    <label for="genero" class="col-sm-4 col-form-label">Genero</label>
                    <div class="col-sm-10">
                        <select type="text" name="genero" class="form-control" value="{{ isset($apoderado->genero)?$apoderado->genero:'' }}" id="genero">
                            <option value="M">Padre</option>
                            <option value="F">Madre</option>
                        </select>
                    </div>
                </div>
            
            

                <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        {{-- <input type="text" name="dni" class="form-control" value="{{ isset($apoderado->dni)?$apoderado->dni:'' }}" id="dni"> --}}
                        <input type="text" name="nombre" class="form-control" value="{{ isset($apoderado->nombre)?$apoderado->nombre:'' }}" id="nombre">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="apellido_materno" class="col-sm-4 col-form-label">Apellido materno</label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido_materno" class="form-control" value="{{ isset($apoderado->apellido_materno)?$apoderado->apellido_materno:'' }}" id="apellido_materno">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="lugar_nacimiento" class="col-sm-4 col-form-label">Lugar de nacimiento</label>
                    <div class="col-sm-10">
                        <input type="text" name="lugar_nacimiento" class="form-control" value="{{ isset($apoderado->lugar_nacimiento)?$apoderado->lugar_nacimiento:'' }}" id="lugar_nacimiento">
                    </div>
                </div>

            </div> 
            
            <div class="col-sm-6">

                <div class="form-group row">
                    <label for="dni" class="col-sm-4 col-form-label">DNI</label>
                    <div class="col-sm-10">
                        <input type="text" name="dni" class="form-control" value="{{ isset($apoderado->dni)?$apoderado->dni:'' }}" id="dni">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellido_paterno" class="col-sm-4 col-form-label">Apellido paterno</label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido_paterno" class="form-control" value="{{ isset($apoderado->apellido_paterno)?$apoderado->apellido_paterno:'' }}" id="apellido_paterno">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="fecha_nacimiento" class="col-sm-4 col-form-label">Fecha de nacimiento</label>
                    <div class="col-sm-10">
                        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ isset($apoderado->fecha_nacimiento)?$apoderado->fecha_nacimiento:'' }}" id="fecha_nacimiento">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="vive" class="col-sm-4 col-form-label">Vive</label>
                    <div class="col-sm-10">
                        <select name="vive" class="form-control" wire:model="vive" id="vive">
                            <option value="true">Si</option>
                            <option value="false">No</option>
                        </select>
                    
                       
                    </div>
                </div>

            </div>
        </div>

        @if($vive == 'false')
        <input type="hidden" class="form-control" name="vive_apoderado" id="vive_apoderado" value="NO">
        @endif

        <input type="text" value="{{ $vive }}">

        @if($vive == 'true')
        <div class="row">
            <div class="col-sm-6">
                
                <div class="form-group row">
                    <label for="grado_instruccion_apoderado" class="col-sm-4 col-form-label">Grado de instruccion</label>
                    <div class="col-sm-10">
                        <input type="text" name="grado_instruccion_apoderado" class="form-control" value="{{ isset($apoderado->grado_instruccion_apoderado)?$apoderado->grado_instruccion_apoderado:'' }}" id="grado_instruccion_apoderado">
                    </div>
                </div>

            </div>
        </div>
        @endif
        
 
{{-- 
        @if($vive == 'true')
        <div class="row">
            <div class="col-sm-6">
                
                <div class="form-group row">
                    <label for="grado_instruccion_apoderado" class="col-sm-4 col-form-label">Grado de instruccion</label>
                    <div class="col-sm-10">
                        <input type="text" name="grado_instruccion_apoderado" class="form-control" value="{{ isset($apoderado->grado_instruccion_apoderado)?$apoderado->grado_instruccion_apoderado:'' }}" id="grado_instruccion_apoderado">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="estado_civil_apoderado" class="col-sm-4 col-form-label">Estado civil</label>
                    <div class="col-sm-10">
                        <input type="text" name="estado_civil_apoderado" class="form-control" value="{{ isset($apoderado->estado_civil_apoderado)?$apoderado->grado_instruccion_apoderado:'' }}" id="grado_instruccion_apoderado">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" value="{{ isset($apoderado->email)?$apoderado->email:'' }}" id="email">
                    </div>
                </div>
                 
                <div class="form-group row">
                    <label for="celular" class="col-sm-4 col-form-label">Celular</label>
                    <div class="col-sm-10">
                        <input type="text" name="celular" class="form-control" value="{{ isset($apoderado->celular)?$apoderado->celular:'' }}" id="celular">
                    </div>
                </div>                

                <div class="form-group row">
                    <label for="direccion_actual" class="col-sm-4 col-form-label">Direccion</label>
                    <div class="col-sm-10">
                        <input type="text" name="direccion_actual" class="form-control" value="{{ isset($apoderado->direccion_actual)?$apoderado->direccion_actual:'' }}" id="direccion_actual">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ocupacion_apoderado" class="col-sm-4 col-form-label">Ocupacion</label>
                    <div class="col-sm-10">
                        <input type="text" name="ocupacion_apoderado" class="form-control" value="{{ isset($apoderado->ocupacion_apoderado)?$apoderado->ocupacion_apoderado:'' }}" id="ocupacion_apoderado">
                    </div>
                </div>
                
                <div class="form-group row">
                    {!! Form::label('documento', 'Documento para publicacion', ['class' => 'col-sm-4 col-form-label']) !!}
                    <div class="col-sm-10">
                    {!! Form::file('documento', ['class' => 'form-control']) !!}
                    </div>
                </div> 
                
                <h6>Unir los 3 PDF y subir un unico archivo:</h6>
                <ul>
                    <li>copia Dni</li>
                    <li>copia Partida Nacimiento</li>
                    <li>copia Certificado de estudios (primaria)</li>
                </ul>

                
                <input class="btn btn-info" type="submit" value="Guardar datos">
            </div>
        </div>
        @endif --}}

        <input class="btn btn-info" type="submit" value="Guardar datos">
    </form>

</div>