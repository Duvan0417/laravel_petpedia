@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Ítem de Pedido #{{ $orderItem->id }}</h2>

    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Información Principal</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-success">Datos del Pedido</h5>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <strong>N° Pedido:</strong> #{{ $orderItem->order_id }}
                        </li>
                        <li class="list-group-item">
                            <strong>Cliente:</strong> {{ $orderItem->order->user->name ?? 'N/A' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Fecha:</strong> {{ $orderItem->created_at->format('d/m/Y H:i') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Estado:</strong> <span class="badge bg-{{ $orderItem->order->status == 'completed' ? 'success' : 'warning' }}">
                                {{ $orderItem->order->status }}
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="text-success">Datos del Producto</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Producto:</strong> {{ $orderItem->product->name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Cantidad:</strong> {{ $orderItem->quantity }}
                        </li>
                        <li class="list-group-item">
                            <strong>Precio Unitario:</strong> ${{ number_format($orderItem->unit_price, 2) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Subtotal:</strong> ${{ number_format($orderItem->quantity * $orderItem->unit_price, 2) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('order_items.index') }}" class="btn btn-outline-success">
            <i class="fas fa-arrow-left"></i> Volver a la lista
        </a>
        <div class="btn-group">
            <a href="{{ route('order_items.edit', $orderItem->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="{{ route('order_items.destroy', $orderItem->id) }}" method="POST" class="ms-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este ítem?')">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection