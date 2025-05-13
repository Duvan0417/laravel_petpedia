@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Editar Item del Carrito</h2>

    <form action="{{ route('shoppingcart.update', ['shoppingcart' => $shoppingcart->id]) }}" method="POST">
    @csrf
    @method('PUT')
    

        
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="user_id" class="form-label">Usuario</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $shoppingcart->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="product_id" class="form-label">Producto</label>
                        <select class="form-select" id="product_id" name="product_id" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" 
                                    data-price="{{ $product->price }}"
                                    {{ $shoppingcart->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} - ${{ number_format($product->price, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="quantity" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" 
                               min="1" value="{{ old('quantity', $shoppingcart->quantity) }}" required>
                        <small class="form-text text-muted">Ingrese la cantidad deseada</small>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Total estimado:</label>
                        <div id="estimated-total" class="fw-bold h5">
                            ${{ number_format($products->firstWhere('id', $shoppingcart->product_id)->price * $shoppingcart->quantity, 2) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('shoppingcart.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Cancelar
            </a>
            <div>
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-save me-1"></i> Guardar Cambios
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="fas fa-trash me-1"></i> Eliminar
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Modal de confirmación -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este item del carrito?</p>
                <p class="text-muted">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Cancelar
                </button>
                <form action="{{ route('shoppingcart.destroy', $shoppingcart->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Eliminar Definitivamente
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Calcular total estimado
    document.addEventListener('DOMContentLoaded', function() {
        const calculateTotal = () => {
            const productSelect = document.getElementById('product_id');
            const quantityInput = document.getElementById('quantity');
            const estimatedTotal = document.getElementById('estimated-total');
            
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
            const quantity = parseInt(quantityInput.value) || 1;
            const total = price * quantity;
            
            estimatedTotal.textContent = `$${total.toFixed(2)}`;
        };

        document.getElementById('product_id').addEventListener('change', calculateTotal);
        document.getElementById('quantity').addEventListener('input', calculateTotal);
        
        // Calcular al cargar
        calculateTotal();
    });
</script>
@endsection
@endsection