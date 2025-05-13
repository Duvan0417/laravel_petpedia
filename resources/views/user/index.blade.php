@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Usuarios</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Crear Usuario
            </a>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye-fill"></i> Ver
                            </a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil-fill"></i> Editar
                            </a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                    <i class="bi bi-trash-fill"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($users->isEmpty())
            <div class="alert alert-info text-center">
                No hay usuarios registrados aún.
            </div>
        @endif
    </div>
@endsection