@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Listado de Órdenes</h1>
            <a href="{{ route('order.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Crear Nueva Orden
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
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            {{-- esto toca cambiarlo despues por ($order->user->name) --}}
                            <td>{{ $order->user?->name ?? 'Usuario no asignado' }}</td>
                            <td class="text-end">${{ number_format($order->total, 2) }}</td>
                            <td>
                                <span @class([
                                    'badge',
                                    'bg-success' => $order->status === 'completed',
                                    'bg-danger' => $order->status === 'cancelled',
                                    'bg-warning text-dark' => !in_array($order->status, ['completed', 'cancelled'])
                                ])>
                                    {{ ucfirst($order->status) }}
                                </span>
                                
                                
                            </td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('order.show', $order->id) }}" 
                                       class="btn btn-sm btn-info" title="Ver detalle">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('order.edit', $order->id) }}" 
                                       class="btn btn-sm btn-warning" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                title="Eliminar"
                                                onclick="return confirm('¿Estás seguro de eliminar esta orden?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay órdenes registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection