@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Foros</h1>
        <a href="{{ route('forums.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nuevo Foro
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th width="5%">ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Creador</th>
                    <th>Temas</th>
                    <th colspan="3" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($forums as $forum)
                    <tr>
                        <td>{{ $forum->id }}</td>
                        <td>{{ $forum->name }}</td>
                        <td>{{ Str::limit($forum->description, 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($forum->date)->format('d/m/Y') }}</td>
                        <td>{{ $forum->user->name ?? 'Anónimo' }}</td>
                        <td>{{ $forum->topics->count() }}</td>
                        
                        <td class="text-center">
                            <a href="{{ route('forums.show', $forum->id) }}" 
                               class="btn btn-sm btn-info" 
                               title="Ver detalles"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                        
                        <td class="text-center">
                            <a href="{{ route('forums.edit', $forum->id) }}" 
                               class="btn btn-sm btn-warning"
                               title="Editar"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        
                        <td class="text-center">
                            <form action="{{ route('forums.destroy', $forum->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        title="Eliminar"
                                        data-bs-toggle="tooltip"
                                        onclick="return confirm('¿Estás seguro de eliminar este foro?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">No hay foros registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($forums->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $forums->links() }}
    </div>
    @endif
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
@endsection