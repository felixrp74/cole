<form action="{{ url('/apoderado/'.$apoderado->idapoderado) }}" method="POST" enctype="multipart/form-data" >
    @csrf
    {{ method_field('PATCH') }} 

    {{-- <div class="card-header">
        <div class="row">
        
    
            <div class="col-sm-6">
    
                <div class="form-group row">
                    <label for="dni" class="col-sm-4 col-form-label">DNI estudiante</label>
                    <div class="col-sm-10">
                        <input wire:model="search" class="form-control" placeholder="buscar por DNI" type="text">
                    </div>
                </div>
    
                @if ($estudiante) 
                <div class="form-group row">
                    <label for="apellido_paterno_estudiante" class="col-sm-4 col-form-label">Paterno Estudiante</label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido_paterno_estudiante" class="form-control" value="{{ isset($estudiante->apellido_paterno)?$estudiante->apellido_paterno:'' }}" id="apellido_paterno_estudiante">
                    </div>
                </div>
    
            </div> 
    
            <div class="col-sm-6">
                
             
    
                <div class="form-group row">
                    <label for="nombre_estudiante" class="col-sm-4 col-form-label">Nombre_estudiante Estudiante</label>
                    <div class="col-sm-10">
                        <input type="text" name="nombre_estudiante" class="form-control" value="{{ isset($estudiante->nombre)?$estudiante->nombre:'' }}" id="nombre_estudiante">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="apellido_materno_estudiante" class="col-sm-4 col-form-label">Materno Estudiante</label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido_materno_estudiante" class="form-control" value="{{ isset($estudiante->apellido_materno)?$estudiante->apellido_materno:'' }}" id="apellido_materno_estudiante">
                    </div>
                </div>
    
    
                @else 
                    <h4>No se tiene registro del estudiante en la BASE DATOS...</h4>
                @endif
    
    
            </div>
    
    
        </div>
    </div> --}}
    
    <div class="card-body">

        <div class="row">

            <div class="col-sm-6">
    
                
                <div class="form-group row">
                    <label for="genero_apoderado" class="col-sm-4 col-form-label">Genero </label>
                    <div class="col-sm-10">
                        <select type="text" name="genero_apoderado" class="form-control" value="{{ isset($apoderado->genero_apoderado)?$apoderado->genero_apoderado:'' }}" id="genero_apoderado">
                            <option value="PADRE">Padre</option>
                            <option value="MADRE">Madre</option>
                        </select>
                    </div>
                </div>
            
            

                <div class="form-group row">
                    <label for="nombre_apoderado" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        {{-- <input type="text" name="dni" class="form-control" value="{{ isset($apoderado->dni)?$apoderado->dni:'' }}" id="dni"> --}}
                        <input type="text" name="nombre_apoderado" class="form-control" value="{{ isset($apoderado->nombre_apoderado)?$apoderado->nombre_apoderado:'' }}" id="nombre_apoderado">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="apellido_paterno_apoderado" class="col-sm-4 col-form-label">Apellido materno</label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido_paterno_apoderado" class="form-control" value="{{ isset($apoderado->apellido_paterno_apoderado)?$apoderado->apellido_paterno_apoderado:'' }}" id="apellido_paterno_apoderado">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="lugar_nacimiento_apoderado" class="col-sm-4 col-form-label">Lugar de nacimiento</label>
                    <div class="col-sm-10">
                        <input type="text" name="lugar_nacimiento_apoderado" class="form-control" value="{{ isset($apoderado->lugar_nacimiento_apoderado)?$apoderado->lugar_nacimiento_apoderado:'' }}" id="lugar_nacimiento_apoderado">
                    </div>
                </div>

            </div> 
            
            <div class="col-sm-6">

                <div class="form-group row">
                    <label for="dni_apoderado" class="col-sm-4 col-form-label">DNI</label>
                    <div class="col-sm-10">
                        <input type="text" name="dni_apoderado" class="form-control" value="{{ isset($apoderado->dni_apoderado)?$apoderado->dni_apoderado:'' }}" id="dni_apoderado">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellido_materno_apoderado" class="col-sm-4 col-form-label">Apellido paterno</label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido_materno_apoderado" class="form-control" value="{{ isset($apoderado->apellido_materno_apoderado)?$apoderado->apellido_materno_apoderado:'' }}" id="apellido_materno_apoderado">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="fecha_nacimiento_apoderado" class="col-sm-4 col-form-label">Fecha de nacimiento</label>
                    <div class="col-sm-10">
                        <input type="date" name="fecha_nacimiento_apoderado" class="form-control" value="{{ isset($apoderado->fecha_nacimiento_apoderado)?$apoderado->fecha_nacimiento_apoderado:'' }}" id="fecha_nacimiento_apoderado">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="vive_apoderado" class="col-sm-4 col-form-label">Vive</label>
                    <div class="col-sm-10">
                        <select name="vive_apoderado" class="form-control" wire:model="vive" id="vive_apoderado">
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    
                    
                    </div>
                </div>

            </div>
        </div>
{{-- 
        
        @if($vive == 'SI')  --}}
        
            <div class="row">
                <div class="col-sm-6">
                    
                    <div class="form-group row">
                        <label for="grado_instruccion_apoderado" class="col-sm-6 col-form-label">Grado de instruccion</label>
                        <div class="col-sm-10">
                            <input type="text" name="grado_instruccion_apoderado" class="form-control" value="{{ isset($apoderado->grado_instruccion_apoderado)?$apoderado->grado_instruccion_apoderado:'' }}" id="grado_instruccion_apoderado">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email_apoderado" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email_apoderado" class="form-control" value="{{ isset($apoderado->email_apoderado)?$apoderado->email_apoderado:'' }}" id="email_apoderado">
                        </div>
                    </div>         

                    <div class="form-group row">
                        <label for="direccion_actual_apoderado" class="col-sm-4 col-form-label">Direccion</label>
                        <div class="col-sm-10">
                            <input type="text" name="direccion_actual_apoderado" class="form-control" value="{{ isset($apoderado->direccion_actual_apoderado)?$apoderado->direccion_actual_apoderado:'' }}" id="direccion_actual_apoderado">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6">

                    <div class="form-group row">
                        <label for="estado_civil_apoderado" class="col-sm-4 col-form-label">Estado civil</label>
                        <div class="col-sm-10">
                            <input type="text" name="estado_civil_apoderado" class="form-control" value="{{ isset($apoderado->estado_civil_apoderado)?$apoderado->grado_instruccion_apoderado:'' }}" id="grado_instruccion_apoderado">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="celular_apoderado" class="col-sm-4 col-form-label">Celular</label>
                        <div class="col-sm-10">
                            <input type="text" name="celular_apoderado" class="form-control" value="{{ isset($apoderado->celular_apoderado)?$apoderado->celular_apoderado:'' }}" id="celular_apoderado">
                        </div>
                    </div>       

                    <div class="form-group row">
                        <label for="ocupacion_apoderado" class="col-sm-4 col-form-label">Ocupacion</label>
                        <div class="col-sm-10">
                            <input type="text" name="ocupacion_apoderado" class="form-control" value="{{ isset($apoderado->ocupacion_apoderado)?$apoderado->ocupacion_apoderado:'' }}" id="ocupacion_apoderado">
                        </div>
                    </div>

                    
                    <input type="hidden" name="estudiantes_idestudiante" id="estudiantes_idestudiante" value="{{$apoderado->estudiantes_idestudiante}}">
                    
                    
                    <div class="form-group row">
                        {!! Form::label('documento', 'Copia de DNI', ['class' => 'col-sm-4 col-form-label']) !!}
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
                    <a class="btn btn-danger" href="{{ url('/apoderado') }}">Regresar</a>
                </div>

            </div>
            
{{-- 
        @endif --}}
            
    </div>
    
</form>
 