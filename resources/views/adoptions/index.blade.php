@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adopciones</h1>
    <a href="{{ route('adoptions.create') }}" class="btn btn-primary">Agregar Adopción</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Animal</th>
                <th>Fecha de Solicitud</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adoptions as $adoption)
            <tr>
                <td>{{ $adoption->id }}</td>
                <td>{{ $adoption->user->name }}</td>
                <td>{{ $adoption->pet->name }}</td>
                <td>{{ $adoption->application_date }}</td>
                <td>{{ $adoption->status }}</td>
                <td>
                    <a href="{{ route('adoptions.edit', $adoption) }}" class="btn btn-warning">Editar</a>
                    <button class="btn btn-info" data-toggle="modal" data-target="#modal-{{ $adoption->id }}">Ver Detalles</button>
                    <form action="{{ route('adoptions.destroy', $adoption) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="modal-{{ $adoption->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-{{ $adoption->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel-{{ $adoption->id }}">Detalles de la Adopción #{{ $adoption->id }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Usuario:</strong> {{ $adoption->user->name }} ({{ $adoption->user->email }})</p>
                            <p><strong>Animal:</strong> {{ $adoption->pet->name }} ({{ $adoption->pet->species }})</p>
                            <p><strong>Fecha de Solicitud:</strong> {{ $adoption->application_date }}</p>
                            <p><strong>Estado:</strong> {{ $adoption->status }}</p>
                            <p><strong>Comentarios:</strong> {{ $adoption->comments }}</p>
                            <p><strong>Solicitud ID:</strong> {{ $adoption->request_id }}</p>
                            <p><strong>Refugio:</strong> {{ $adoption->shelter->name }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    // Incluir jQuery y Bootstrap JS si no están ya incluidos
    $(document).ready(function(){
        $('[data-toggle="modal"]').on('click', function(){
            var target = $(this).data('target');
            $(target).modal('show');
        });
    });
</script>
@endsection
