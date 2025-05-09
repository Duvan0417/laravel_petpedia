@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Inventario</h2>
    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="product_id">Producto</label>
            <select class="form-control" id="product_id" name="product_id" required>
                @foreach($products as $product)
                <option value="{{ $product->id }}" 
                    {{ $inventory->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="quantity_available">Cantidad Disponible</label>
            <input type="number" class="form-control" id="quantity_available" 
                   name="quantity_available" required min="0" 
                   value="{{ $inventory->quantity_available }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection