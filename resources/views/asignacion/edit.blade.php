editar

<form action="{{ url('/asignacion/'.$asignacion->idasignacion) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('asignacion.form');
</form>