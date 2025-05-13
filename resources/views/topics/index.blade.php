@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Temas</h1>
        <a href="{{ route('topics.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nuevo Tema 
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
                    <th>Título</th>
                    <th>Foro</th>
                    <th>Fecha Creación</th>
                    <th>Comentarios</th>
                    <th colspan="3" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($topics as $topic)
                    <tr>
                        <td>{{ $topic->id }}</td>
                        <td>{{ $topic->title }}</td>
                        <td>{{ $topic->forum->name ?? 'Sin foro' }}</td>
                        <td>{{ \Carbon\Carbon::parse($topic->forum->date)->format('d/m/Y') }}</td>
                        <td>{{ $topic->comments ? $topic->comments->count() : 0 }}</td>

                        
                        <td class="text-center">
                            <a href="{{ route('topics.show', $topic->id) }}" 
                               class="btn btn-sm btn-info" 
                               title="Ver detalles"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                        
                        <td class="text-center">
                            <a href="{{ route('topics.edit', $topic->id) }}" 
                               class="btn btn-sm btn-warning"
                               title="Editar"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        
                        <td class="text-center">
                            <form action="{{ route('topics.destroy', $topic->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        title="Eliminar"
                                        data-bs-toggle="tooltip"
                                        onclick="return confirm('¿Estás seguro de eliminar este tópico?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No hay tópicos registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($topics->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $topics->links() }}
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