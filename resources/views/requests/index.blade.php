@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Listado de Solicitudes</h1>
        <a href="{{ route('requests.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nueva Solicitud
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Usuario</th>
                    <th>Refugio</th>
                    <th>Fecha</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Cita</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                <tr>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->shelter->name }}</td>
                    <td>{{ $request->date->format('d/m/Y H:i') }}</td>
                    <td>
                        <span class="badge bg-{{ $request->priority == 1 ? 'danger' : ($request->priority == 2 ? 'warning' : 'primary') }}">
                            {{ $request->priority == 1 ? 'Alta' : ($request->priority == 2 ? 'Media' : 'Baja') }}
                        </span>
                    </td>
                    <td>{{ ucfirst(str_replace('_', ' ', $request->solicitation_status)) }}</td>
                    <td>
                        @if($request->appointment)
                            {{ $request->appointment->date->format('d/m/Y H:i') }}
                        @else
                            Sin cita
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('requests.destroy', $request->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta solicitud?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection