@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Veterinarios</h1>
    <a href="{{ route('veterinarians.create') }}" class="btn btn-primary">Agregar Veterinario</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Horas</th>
                <th>Servicios Ofrecidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($veterinarians as $veterinarian)
            <tr>
                <td>{{ $veterinarian->id }}</td>
                <td>{{ $veterinarian->name }}</td>
                <td>{{ $veterinarian->address }}</td>
                <td>{{ $veterinarian->phone }}</td>
                <td>{{ $veterinarian->hours }}</td>
                <td>{{ $veterinarian->services_offered }}</td>
                <td>
                    <a href="{{ route('veterinarians.edit', $veterinarian) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('veterinarians.destroy', $veterinarian) }}" method="POST" style="display:inline;">
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
