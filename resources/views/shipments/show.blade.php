@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Envío</h2>

    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <h3 class="card-title text-success">Envío #{{ $shipment->id }}</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Dirección:</strong> {{ $shipment->shipping_address }}
                        </li>
                        <li class="list-group-item">
                            <strong>Costo:</strong> ${{ number_format($shipment->cost, 2) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Estado:</strong> 
                            <span class="badge bg-{{ $shipment->status == 'entregado' ? 'success' : ($shipment->status == 'enviado' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($shipment->status) }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <strong>Método:</strong> {{ $shipment->shipping_method }}
                        </li>
                        <li class="list-group-item">
                            <strong>Pedido asociado:</strong> 
                            @if($shipment->order_id)
                                <a href="{{ route('orders.show', $shipment->order_id) }}">Pedido #{{ $shipment->order_id }}</a>
                            @else
                                Ninguno
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong>Fecha creación:</strong> {{ $shipment->created_at->format('d/m/Y H:i') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('shipments.index') }}" class="btn btn-outline-success">
            <i class="fas fa-arrow-left"></i> Volver a la lista
        </a>
        <div>
            <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="{{ route('shipments.destroy', $shipment->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este envío?')">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection