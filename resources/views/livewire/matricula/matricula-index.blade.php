<div class="card">
    {{-- cabecera tabla --}}
     
    <div class="card-header">

        <a class="btn btn-info" href="{{ url('matricula/create') }}">Registrar matricula</a>
    </div>
    
    <div class="container">
        <input wire:model = "search" class="form-control" placeholder="buscar por nombre" type="text">

    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nombre</td>
                    <td>Paterno</td>
                    <td>Materno </td>
                    <td colspan="3">Acciones </td>
                </tr>

                <input type="hidden" name="" value="{{ $i = 1 }}">
            </thead>
            <tbody>
                @foreach( $matriculass as $matricula )
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $matricula->nombre }}</td>
                    <td>{{ $matricula->apellido_paterno }}</td>
                    <td>{{ $matricula->apellido_materno }}</td>
                    <td> 
                        <a class="btn btn-info" href="{{ url('/matricula/'.$matricula->idmatricula.'/edit') }}">Editar</a>
                    </td> 
                    <td>
                        <form action="{{ url('/matricula/'.$matricula->idmatricula) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" onclick="return confirm('quieres borrar?')" value="Borrar">
                        </form>

                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{ url('/matricula/'.$matricula->idmatricula) }}">Ver mas</a>                       

                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>


    </div>
</div>
    