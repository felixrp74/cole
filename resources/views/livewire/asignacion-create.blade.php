<div class="card">

    <div class="card-body">


        <form action="{{ url('/asignacion') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <label for="dni">DNI</label>
            <input wire:model = "search" placeholder="buscar por DNI" type="text">
            <br>

            @if ($docente)
                <input type="hidden" name="IdDocente" id="IdDocente" value="{{$docente->iddocente}}">
                
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" value="{{$docente->nombre}}">
                <br>
                <label for="apellido_paterno">Paterno</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{$docente->apellido_paterno}}">
                <br>
                <label for="apellido_materno">Materno</label>
                <input type="text" name="apellido_materno" id="apellido_materno" value="{{$docente->apellido_materno}}">
                <br>
            @else 
                    <h4>No se tiene registro del docente en la BASE DATOS...</h4>
            @endif

            <label for="Seccion">Seccion</label>
            {{-- <input type="text" name="Seccion" id="Seccion" value="C"> --}}
            <select name="Seccion" id="Seccion">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
            <br>

            <label for="Grado">Grado</label>
            {{-- <input type="text" name="Grado" id="Grado" value="1"> --}}
            <select name="Grado" id="Grado">
                <option value="1">PRIMERO</option>
                <option value="2">SEGUNDO</option>
                <option value="3">TERCERO</option>
                <option value="4">TERCERO</option>
                <option value="5">TERCERO</option>
            </select>
            <br>

            <label for="anio_academico">A??o acad??mico</label>
            {{-- <input type="text" name="anio_academico" id="anio_academico" value="1"> --}}
            <select name="anio_academico" id="anio_academico">
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
            <br>

            <label for="Especialidad">Especialidad</label>
            {{-- <input type="text" name="Especialidad" id="Especialidad" value="AUTOMOTRIZ"> --}}
            <select name="Especialidad" id="Especialidad">
                <option value="AIP - ROB??TICA">AIP - ROB??TICA</option>
                <option value="COMPUTACI??N">COMPUTACI??N</option>
                <option value="CONSTRUCCI??N CIVIL">CONSTRUCCI??N CIVIL</option>
                <option value="COSMETOLOG??A">COSMETOLOG??A</option>
                <option value="ELECTRICIDAD">ELECTRICIDAD</option>
                <option value="ELECTR??NICA">ELECTR??NICA</option>
                <option value="INDUSTRIA ALIMENTARIA">INDUSTRIA ALIMENTARIA</option>
                <option value="INDUSTRIA TEXTIL">INDUSTRIA TEXTIL</option>
                <option value="INDUSTRIA DEL VESTIDO">INDUSTRIA DEL VESTIDO</option>
            </select>
            <br>

            <label for="Curso">Curso</label>
            {{-- <input type="text" name="Curso" id="Curso" value="AUTOMOTRIZ"> --}}
            <select name="Curso" id="Curso">
                <option value="ARTE">ARTE</option>
                <option value="CIENCIA TECNOLOG??A Y AMBIENTE">CIENCIA TECNOLOG??A Y AMBIENTE</option>
                <option value="COMUNICACI??N">COMUNICACI??N</option>
                <option value="FORMACION CIUDADANA Y C??VICA">FORMACION CIUDADANA Y C??VICA</option>
                <option value="INGL??S">INGL??S</option>
                <option value="EDUCACI??N F??SICA">EDUCACI??N F??SICA</option>
                <option value="EDUCACI??N RELIGIOSA">EDUCACI??N RELIGIOSA</option>
                <option value="HISTORIA GEOGRAF??A Y ECONOM??A">HISTORIA GEOGRAF??A Y ECONOM??A</option>
                <option value="MATEM??TICA">MATEM??TICA</option>
                <option value="PERSONA FAMILIA Y RELACIONES HUMANAS">PERSONA FAMILIA Y RELACIONES HUMANAS</option>
                <option value="EDUCACI??N PARA EL TRABAJO">EDUCACI??N PARA EL TRABAJO</option>

            </select>
            <br>

            <input class="btn btn-info" type="submit" value="Guardar datos">

        </form>


    </div>
</div>