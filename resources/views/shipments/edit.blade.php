@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Actualizar Envío</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('shipments.update', $shipment) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Dirección de Envío</label>
                        <input type="text" name="shipping_address" id="shipping_address" 
                               value="{{ old('shipping_address', $shipment->shipping_address) }}" 
                               class="form-control" required>

                        <label for="cost" class="form-label">Costo</label>
                        <input type="number" name="cost" id="cost" 
                               value="{{ old('cost', $shipment->cost) }}" 
                               class="form-control" step="0.01" required>

                        <label for="status" class="form-label">Estado</label>
                        <input type="text" name="status" id="status" 
                               value="{{ old('status', $shipment->status) }}" 
                               class="form-control" required>

                        <label for="shipping_method" class="form-label">Método de Envío</label>
                        <input type="text" name="shipping_method" id="shipping_method" 
                               value="{{ old('shipping_method', $shipment->shipping_method) }}" 
                               class="form-control" required>

                        <label for="order_id" class="form-label">ID de Pedido (Opcional)</label>
                        <input type="number" name="order_id" id="order_id" 
                               value="{{ old('order_id', $shipment->order_id) }}" 
                               class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Actualizar Envío
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection