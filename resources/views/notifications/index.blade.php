@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Notificaciones</h1>

    <a href="{{ route('notifications.create') }}" class="btn btn-primary mb-3">Crear Notificación</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Entrenador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                <tr>
                    <td>{{ $notification->Title }}</td>
                    <td>{{ $notification->Description }}</td>
                    <td>{{ $notification->trainer->name ?? 'Sin entrenador' }}</td>
                    <td>
                        <a href="{{ route('notifications.show', $notification->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
