@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agregar Registro de Inventario</h2>
    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="product_id">Producto</label>
            <select class="form-control" id="product_id" name="product_id" required>
                <option value="">Seleccione un producto</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="quantity_available">Cantidad Disponible</label>
            <input type="number" class="form-control" id="quantity_available" 
                   name="quantity_available" required min="0" value="0">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection