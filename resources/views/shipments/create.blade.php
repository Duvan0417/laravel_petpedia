@extends('layouts.app')

@section('content')
<form action="{{ route('shipments.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Dirección de Envío</label>
        <input type="text" id="title" name="shipping_address" class="form-control" required>

        <label for="title" class="form-label">Costo</label>
        <input type="number" id="title" name="cost" class="form-control" step="0.01" required>

        <label for="title" class="form-label">Estado</label>
        <input type="text" id="title" name="status" class="form-control" required>

        <label for="title" class="form-label">Método de Envío</label>
        <input type="text" id="title" name="shipping_method" class="form-control" required>

        <label for="title" class="form-label">ID de Pedido (Opcional)</label>
        <input type="number" id="title" name="order_id" class="form-control">
    </div>

    <button type="submit" class="btn btn-outline-success mb-4">Crear</button>
</form>
@endsection