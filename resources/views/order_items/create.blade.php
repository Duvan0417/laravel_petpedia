@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Agregar Ítem al Pedido</h2>

    <form action="{{ route('order_items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="order_id" class="form-label">Pedido</label>
            <select class="form-control" id="order_id" name="order_id" required>
                <option value="">Seleccionar Pedido</option>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">Pedido #{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select class="form-control" id="product_id" name="product_id" required>
                <option value="">Seleccionar Producto</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                        {{ $product->name }} - ${{ number_format($product->price, 2) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
        </div>

        <div class="mb-3">
            <label for="unit_price" class="form-label">Precio Unitario</label>
            <input type="number" step="0.01" class="form-control" id="unit_price" name="unit_price" min="0" required>
        </div>

        <button type="submit" class="btn btn-outline-success">Agregar Ítem</button>
        <a href="{{ route('order_items.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
</div>

<script>
// Auto-completar precio al seleccionar producto
document.getElementById('product_id').addEventListener('change', function() {
    const selectedProduct = this.options[this.selectedIndex];
    const price = selectedProduct.getAttribute('data-price');
    if(price) {
        document.getElementById('unit_price').value = price;
    }
});
</script>
@endsection