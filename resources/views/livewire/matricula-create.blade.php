<div class="card">

    <form action="{{ url('/matricula') }}" method="POST" enctype="multipart/form-data" >
        @csrf

        <label for="IdEstudiante">Id Estudiante</label>
        <input wire:model = "search"  placeholder="buscar por id" type="text">
        <br>

        @if ($estudiante)
            <input type="hidden" name="IdEstudiante" id="IdEstudiante" value="{{$estudiante->idestudiante}}">
            <label for="Nombre">Nombre</label>
            <input type="text" name="Nombre" id="Nombre" value="{{$estudiante->nombre}}">
            <br>
        @else 
                <h4>No se tiene registro del estudiante en la BASE DATOS...</h4>
        @endif


        <label for="Grado">Grado</label>
        {{-- <input type="text" name="Grado" id="Grado" value="1"> --}}
        <select name="Grado" id="Grado">
            <option value="1">PRIMERO</option>
            <option value="2">SEGUNDO</option>
            <option value="3">TERCERO</option>
        </select>
        <br>

        <label for="Seccion">Seccion</label>
        {{-- <input type="text" name="Seccion" id="Seccion" value="C"> --}}
        <select name="Seccion" id="Seccion">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <br>

        <label for="Especialidad">Especialidad</label>
        {{-- <input type="text" name="Especialidad" id="Especialidad" value="AUTOMOTRIZ"> --}}
        <select name="Especialidad" id="Especialidad">
            <option value="COMPUTACIÓN">COMPUTACIÓN</option>
            <option value="INDUSTRIA ALIMENTARIA">INDUSTRIA ALIMENTARIA</option>
            <option value="INDUSTRIA TEXTIL">INDUSTRIA TEXTIL</option>
            <option value="INDUSTRIA DEL VESTIDO">INDUSTRIA DEL VESTIDO</option>
            <option value="CONSTRUCCIÓN CIVIL">CONSTRUCCIÓN CIVIL</option>
            <option value="ELECTRÓNICA">ELECTRÓNICA</option>
            <option value="ELECTRICIDAD">ELECTRICIDAD</option>
            <option value="COSMETOLOGÍA">COSMETOLOGÍA</option>
            <option value="AIP - ROBÓTICA">AIP - ROBÓTICA</option>
        </select>
        <br>

        <input class="btn btn-info" type="submit" value="Guardar datos">

    </form>


</div>