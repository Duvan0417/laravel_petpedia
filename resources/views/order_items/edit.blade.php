@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Ítem de Pedido #{{ $orderItem->id }}</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('order_items.update', $orderItem) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="order_id" class="form-label">Pedido</label>
                        <select class="form-control" id="order_id" name="order_id" required>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}" 
                                    {{ $order->id == $orderItem->order_id ? 'selected' : '' }}>
                                    Pedido #{{ $order->id }} - {{ $order->user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="product_id" class="form-label">Producto</label>
                        <select class="form-control" id="product_id" name="product_id" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" 
                                    data-price="{{ $product->price }}"
                                    {{ $product->id == $orderItem->product_id ? 'selected' : '' }}>
                                    {{ $product->name }} - ${{ number_format($product->price, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" 
                               min="1" value="{{ old('quantity', $orderItem->quantity) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="unit_price" class="form-label">Precio Unitario</label>
                        <input type="number" step="0.01" class="form-control" id="unit_price" 
                               name="unit_price" min="0" value="{{ old('unit_price', $orderItem->unit_price) }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Actualizar Ítem
                        </button>
                        <a href="{{ route('order_items.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    // Auto-completar precio al cambiar producto
    document.getElementById('product_id').addEventListener('change', function() {
        const selectedProduct = this.options[this.selectedIndex];
        const price = selectedProduct.getAttribute('data-price');
        if(price) {
            document.getElementById('unit_price').value = price;
        }
    });
    </script>
@endsection