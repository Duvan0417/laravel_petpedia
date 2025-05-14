@extends('layouts.app')

@section('title', 'Lista de Mascotas')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Mascotas</h1>
        <a href="{{ route('pets.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Agregar Nueva Mascota
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Especie</th>
                            <th>Raza</th>
                            <th>Edad</th>
                            <th>Tamaño (kg)</th>
                            <th>Sexo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td>{{ $pet->name }}</td>
                            <td>{{ $pet->species }}</td>
                            <td>{{ $pet->breed }}</td>
                            <td>{{ $pet->age }}</td>
                            <td>{{ number_format($pet->size, 2) }}</td>
                            <td>{{ $pet->sex }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('pets.show', $pet->id) }}" class="btn btn-sm btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" 
                                        onclick="return confirm('¿Estás seguro de eliminar esta mascota?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay mascotas registradas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($pets->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $pets->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection