@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Agregar Producto al Carrito</h2>
    
    <form action="{{ route('shoppingcart.store') }}" method="POST">
        @csrf
        
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuario</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option value="">Seleccione un usuario</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="product_id" class="form-label">Producto</label>
                    <select class="form-select" id="product_id" name="product_id" required>
                        <option value="">Seleccione un producto</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }} - ${{ number_format($product->price, 2) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" 
                           min="1" value="1" required>
                    <div class="form-text">Ingrese la cantidad deseada</div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Total estimado:</label>
                    <div id="estimated-total" class="fw-bold">$0.00</div>
                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-between">
            <a href="{{ route('shoppingcart.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Regresar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-cart-plus"></i> Agregar al Carrito
            </button>
        </div>
    </form>
</div>

@section('scripts')
<script>
    // Calcular total estimado al cambiar cantidad o producto
    document.addEventListener('DOMContentLoaded', function() {
        const productSelect = document.getElementById('product_id');
        const quantityInput = document.getElementById('quantity');
        const estimatedTotal = document.getElementById('estimated-total');
        
        function calculateTotal() {
            const selectedProduct = productSelect.options[productSelect.selectedIndex];
            const price = selectedProduct ? parseFloat(selectedProduct.getAttribute('data-price')) : 0;
            const quantity = parseInt(quantityInput.value) || 0;
            const total = price * quantity;
            
            estimatedTotal.textContent = `$${total.toFixed(2)}`;
        }
        
        productSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);
        
        // Calcular inicialmente
        calculateTotal();
    });
</script>
@endsection
@endsection