@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Envíos</h1>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Dirección</th>
                    <th>Costo</th>
                    <th>Estado</th>
                    <th>Método</th>
                    <th>Pedido ID</th>
                    <th>Acciones</th>
                    <th>
                        <a href="{{ route('shipments.create') }}" class="btn btn-warning btn-sm">Crear</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shipments as $shipment)
                    <tr>
                        <td>{{ $shipment->id }}</td>
                        <td>{{ $shipment->shipping_address }}</td>
                        <td>${{ number_format($shipment->cost, 2) }}</td>
                        <td>{{ $shipment->status }}</td>
                        <td>{{ $shipment->shipping_method }}</td>
                        <td>{{ $shipment->order_id ?? 'N/A' }}</td>
                        
                        <td>
                            <a href="{{ route('shipments.show', $shipment->id) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                        <td>
                            <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-success btn-sm">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('shipments.destroy', $shipment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash-fill"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection