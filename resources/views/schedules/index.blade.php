@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Horarios</h1>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Crear Nuevo Horario</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Ubicación</th>
                <th>Servicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr><td>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>

                    <td>{{ $schedule->hour }}:00</td>
                    <td>{{ $schedule->location }}</td>
                    <td>{{ $schedule->service->name ?? 'Sin servicio' }}</td>
                    <td>
                        <a href="{{ route('schedules.show', $schedule->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $schedules->links() }}
</div>
@endsection