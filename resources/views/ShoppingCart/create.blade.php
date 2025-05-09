@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Nuevo Carrito de Compras</h2>
    
    <form action="{{ route('shoppingcart.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="creation_date" class="form-label">Fecha de Creación</label>
            <input type="date" class="form-control" id="creation_date" name="creation_date" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select class="form-select" id="user_id" name="user_id">
                <option value="">Seleccione un usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select class="form-select" id="product_id" name="product_id" required>
                <option value="">Seleccione un producto</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="order_id" class="form-label">Orden (Opcional)</label>
            <select class="form-select" id="order_id" name="order_id">
                <option value="">Sin orden asociada</option>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">Orden #{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('shoppingcart.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection