@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Actualizar Carrito de Compras</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('shoppingcart.update', $shoppingCart) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="creation_date" class="form-label">Fecha de Creación</label>
                            <input type="date" class="form-control @error('creation_date') is-invalid @enderror" 
                                   id="creation_date" name="creation_date" 
                                   value="{{ old('creation_date', $shoppingCart->creation_date) }}" required>
                            @error('creation_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="quantity" class="form-label">Cantidad</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                                   id="quantity" name="quantity" min="1" 
                                   value="{{ old('quantity', $shoppingCart->quantity) }}" required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="product_id" class="form-label">Producto</label>
                        <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                            <option value="">Seleccione un producto</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" 
                                    {{ old('product_id', $shoppingCart->product_id) == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} - ${{ number_format($product->price, 2) }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order_id" class="form-label">Orden (Opcional)</label>
                        <select class="form-select @error('order_id') is-invalid @enderror" id="order_id" name="order_id">
                            <option value="">No asociado a orden</option>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}" 
                                    {{ old('order_id', $shoppingCart->order_id) == $order->id ? 'selected' : '' }}>
                                    Orden #{{ $order->id }} - {{ $order->created_at->format('d/m/Y') }}
                                </option>
                            @endforeach
                        </select>
                        @error('order_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('shoppingcart.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Actualizar Carrito
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection