@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-info">Detalles del Horario</h2>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th class="table-info">ID</th>
                            <td>{{ $schedule->id }}</td>
                        </tr>
                        <tr>
                            <th class="table-info">Fecha</th>
                            <td>{{ $schedule->date->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th class="table-info">Hora</th>
                            <td>{{ str_pad($schedule->hour, 2, '0', STR_PAD_LEFT) }}:00</td>
                        </tr>
                        <tr>
                            <th class="table-info">Ubicación</th>
                            <td>{{ $schedule->location }}</td>
                        </tr>
                        <tr>
                            <th class="table-info">Servicio</th>
                            <td>{{ $schedule->service->name ?? 'No asignado' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('schedules.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al listado
                </a>
                <div>
                    <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-primary me-2">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('¿Eliminar este horario?')">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table th {
        width: 30%;
    }
</style>
@endsection