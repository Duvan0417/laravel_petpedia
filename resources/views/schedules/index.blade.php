@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Horarios</h1>
        <a href="{{ route('schedules.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nuevo Horario
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
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Ubicación</th>
                    <th>Servicio</th>
                    <th colspan="3" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->date->format('d/m/Y') }}</td>
                        <td>{{ $schedule->hour }}:00</td>
                        <td>{{ $schedule->location }}</td>
                        <td>{{ $schedule->service->name ?? 'Sin servicio' }}</td>
                        
                        <td class="text-center">
                            <a href="{{ route('schedules.show', $schedule->id) }}" 
                               class="btn btn-sm btn-info" 
                               title="Ver detalles"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                        
                        <td class="text-center">
                            <a href="{{ route('schedules.edit', $schedule->id) }}" 
                               class="btn btn-sm btn-warning"
                               title="Editar"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        
                        <td class="text-center">
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        title="Eliminar"
                                        data-bs-toggle="tooltip"
                                        onclick="return confirm('¿Estás seguro de eliminar este horario?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No hay horarios registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($schedules->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $schedules->links() }}
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