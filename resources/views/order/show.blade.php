@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Detalles de la Orden #{{ $order->id }}</h2>

        <span @class([
    'badge',
    'bg-success' => $order->status === 'completed',
    'bg-danger' => $order->status === 'cancelled',
    'bg-warning text-dark' => !in_array($order->status, ['completed', 'cancelled'])
])>
    {{ ucfirst($order->status) }}
</span>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mb-3">Información del Cliente</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Nombre:</strong> {{ $order->user->name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ $order->user->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>ID Usuario:</strong> {{ $order->user_id }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-3">Detalles de la Orden</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Total:</strong> ${{ number_format($order->total, 2) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Fecha creación:</strong> {{ $order->created_at->format('d/m/Y H:i') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Última actualización:</strong> {{ $order->updated_at->format('d/m/Y H:i') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Aquí podrías agregar una sección para los items de la orden si los tuvieras -->
    <!-- <div class="card mb-4">
        <div class="card-header bg-light">
            <h4 class="mb-0">Productos en esta orden</h4>
        </div>
        <div class="card-body">
            [Listado de productos...]
        </div>
    </div> -->

    <div class="d-flex justify-content-between">
        <a href="{{ route('order.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left"></i> Volver al listado
        </a>
        <div class="btn-group">
            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar Orden
            </a>
            <form action="{{ route('order.destroy', $order->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('¿Estás seguro de eliminar esta orden?')">
                    <i class="bi bi-trash"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection