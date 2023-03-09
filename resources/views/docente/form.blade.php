
 

        <label for="Dni">Dni</label>
        <input type="text" name="dni" value="{{ isset($docente->dni)?$docente->dni:'' }}" id="dni">
        <br>

        <label for="Nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ isset($docente->nombre)?$docente->nombre:'' }}" id="nombre">
        <br>

        <label for="Profesion">Profesion</label>
        <input type="text" name="profesion" value="{{ isset($docente->profesion)?$docente->profesion:'' }}" id="profesion">
        <br>

        <label for="Apellido Paterno">Apellido Paterno</label>
        <input type="text" name="apellido_paterno" value="{{ isset($docente->apellido_paterno)?$docente->apellido_paterno:'' }}" id="apellido_paterno">
        <br>

        <label for="Apellido Materno">Apellido Materno</label>
        <input type="text" name="apellido_materno" value="{{ isset($docente->apellido_materno)?$docente->apellido_materno:'' }}" id="apellido_materno">
        <br>

        <label for="Celular">Celular</label>
        <input type="text" name="celular" value="{{ isset($docente->celular)?$docente->celular:'' }}" id="celular">
        <br>

        <label for="Email">Email</label>
        <input type="text" name="email" value="{{ isset($docente->email)?$docente->email:'' }}" id="email">
        <br>

        <label for="Password">Password</label>
        <input type="text" name="password" value="{{ isset($docente->password)?$docente->password:'' }}" id="password">
        <br>            
 
<label for="Enviar">Enviar</label>
<input class="btn btn-info" type="submit" value="Guardar datos">

<a class="btn btn-danger" href="{{ url('/docente') }}">Regresar</a>