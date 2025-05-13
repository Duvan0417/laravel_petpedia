@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Refugios</h1>
    <a href="{{ route('shelters.create') }}" class="btn btn-primary">Agregar Refugio</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Responsable</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shelters as $shelter)
            <tr>
                <td>{{ $shelter->id }}</td>
                <td>{{ $shelter->name }}</td>
                <td>{{ $shelter->phone }}</td>
                <td>{{ $shelter->responsible }}</td>
                <td>{{ $shelter->email }}</td>
                <td>{{ $shelter->address }}</td>
                <td>
                    <a href="{{ route('shelters.edit', $shelter) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('shelters.destroy', $shelter) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
