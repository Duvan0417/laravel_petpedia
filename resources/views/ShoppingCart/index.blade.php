@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Carrito de Compras</h1>
        <a href="{{ route('shoppingcart.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Agregar Item
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($shoppingCarts as $cartItem)
                            <tr>
                                <td>{{ $cartItem->id }}</td>
                                <td>{{ $cartItem->user->name }}</td>
                                <td>{{ $cartItem->product->name }}</td>
                                <td>{{ $cartItem->quantity }}</td>
                                <td>${{ number_format($cartItem->product->price, 2) }}</td>
                                <td>${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('shoppingcart.show', $cartItem->id) }}" 
                                       class="btn btn-sm btn-info" title="Ver detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('shoppingcart.edit', $cartItem->id) }}" 
                                       class="btn btn-sm btn-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('shoppingcart.destroy', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"
                                                onclick="return confirm('¿Estás seguro de eliminar este item del carrito?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">No hay items en el carrito</td>
                            </tr>
                        @endforelse

                        @if($shoppingCarts->isNotEmpty())
                            <tr class="table-active">
                                <td colspan="5" class="text-end fw-bold">Total:</td>
                                <td class="fw-bold">
                                    ${{ number_format($shoppingCarts->sum(function($item) {
                                        return $item->product->price * $item->quantity;
                                    }), 2) }}
                                </td>
                                <td></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection