@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-primary">Detalles del Item en el Carrito</h2>

    @if(!$shoppingCart->exists)
        <div class="alert alert-danger">
            El item del carrito no existe o ha sido eliminado
        </div>
    @else
    <div class="card mb-4 shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Información del Pedido</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-primary">Datos del Usuario</h5>
                    <ul class="list-group mb-4">
                        <li class="list-group-item">
                            <strong>Nombre:</strong> {{ $shoppingCart->user->name ?? 'Usuario no disponible' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ $shoppingCart->user->email ?? 'N/A' }}
                        </li>
                        <li class="list-group-item">
                            <strong>ID Usuario:</strong> {{ $shoppingCart->user_id }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="text-primary">Datos del Producto</h5>
                    <ul class="list-group mb-4">
                        <li class="list-group-item">
                            <strong>Producto:</strong> {{ $shoppingCart->product->name ?? 'Producto eliminado' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Categoría:</strong> 
                            {{ $shoppingCart->product->category->name ?? 'Sin categoría' }}
                        </li>
                        <li class="list-group-item">
                            <strong>ID Producto:</strong> {{ $shoppingCart->product_id }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h5 class="text-primary">Detalles de Compra</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Cantidad:</strong> {{ $shoppingCart->quantity }}
                        </li>
                        <li class="list-group-item">
                            <strong>Precio Unitario:</strong> 
                            ${{ number_format($shoppingCart->product->price ?? 0, 2) }}
                        </li>
                        <li class="list-group-item list-group-item-success fw-bold">
                            <strong>Subtotal:</strong> 
                            ${{ number_format(($shoppingCart->product->price ?? 0) * $shoppingCart->quantity, 2) }}
                        </li>
                    </ul>
                </div>
                @if($shoppingCart->product && $shoppingCart->product->image)
                <div class="col-md-6 text-center">
                    <img src="{{ asset('storage/' . $shoppingCart->product->image) }}" 
                         class="img-fluid rounded" 
                         alt="{{ $shoppingCart->product->name }}"
                         style="max-height: 200px;">
                    <p class="mt-2 text-muted">Imagen del producto</p>
                </div>
                @endif
            </div>
        </div>
        <div class="card-footer text-muted">
            <small>
                <strong>Agregado el:</strong> {{ $shoppingCart->created_at->format('d/m/Y H:i') }} | 
                <strong>Última actualización:</strong> {{ $shoppingCart->updated_at->format('d/m/Y H:i') }}
            </small>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('shoppingcart.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left"></i> Volver al Carrito
        </a>
        <div>
            <a href="{{ route('shoppingcart.edit', $shoppingCart->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar Cantidad
            </a>
            <form action="{{ route('shoppingcart.destroy', $shoppingCart->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('¿Estás seguro de eliminar este item del carrito?')">
                    <i class="fas fa-trash"></i> Eliminar Item
                </button>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection