<div>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
   


    <div class="card">
        {{-- cabecera tabla --}}
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('admin.users.create')}}">Agregar Usuario</a>
        </div>
        
        <div class="container">
            <input wire:model = "search" class="form-control" placeholder="buscar por nombre" type="text">

        </div>

        {{ $i = 1 }}

        @if ($colocacionnotass->count())
            {{-- cuerpo tabla --}}
            
            <a href="{{ url('reporteestudiante/create') }}">Notas de los estudiantes</a>

            <form action="{{ url('/colocacionnotas/'.$colocacionnotass[0]->idasignacion) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                
                <p><label for="Idestudiante">Id asignacion: </label> {{ $colocacionnotass[0]->idasignacion }}</p>
                <p><label for="Idestudiante">Id estudiante: </label> {{ $colocacionnotass[0]->nombreDocente }}</p> 


                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>   
                                <td># </td>
                                <td>NombreDocente </td>
                                <td>Nombre </td>
                                <td>Grado </td>
                                <td>Seccion </td>
                                <td>Curso </td>
                                <td>Especialidad </td>
                                <td>Nota 1</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $colocacionnotass as $colocacionnota )
                            <tr>  
                                <td>{{ $i }}</td>
                                <td>{{ $colocacionnota->nombreDocente }}</td>
                                <td>{{ $colocacionnota->nombre }}</td>
                                <td>{{ $colocacionnota->grado }}</td>
                                <td>{{ $colocacionnota->seccion }}</td>
                                <td>{{ $colocacionnota->descripcion }}</td>
                                <td>{{ $colocacionnota->especialidad }}</td>
                                <td><input type="number" name="{{ 'nota1'.$i }}" id="{{ 'nota1'.$i }}" value="{{ $colocacionnota->nota1 }}" max=20 min=0></td>
                                <input type="hidden" id="{{ 'estudiante'.$i }}" name="{{ 'estudiante'.$i }}" value="{{$colocacionnota->idestudiante}}">
                                <input type="hidden" id="{{ 'curso'.$i }}" name="{{ 'curso'.$i }}" value="{{$colocacionnota->idcurso}}">
                                <input type="hidden" id="{{ 'nivel'.$i }}" name="{{ 'nivel'.$i }}" value="{{$colocacionnota->idniveles}}">
                                <input type="hidden" id="{{ 'idmatricula'.$i }}" name="{{ 'idmatricula'.$i }}" value="{{$colocacionnota->idmatricula}}">
                                <input type="hidden" id="{{ 'idcurso'.$i }}" name="{{ 'idcurso'.$i++ }}" value="{{$colocacionnota->idcurso}}">
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <input type="submit" value="Guardar datos">
            </form>
            
            <div class="card-footer">
                
            </div> 
            
        @else
            <div class="card-body">
                <h4>No se tiene registro en la BASE DATOS...</h4>

            </div>
        @endif


    </div>



</div>
