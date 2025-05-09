@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Producto</h2>

    <div class="card mb-4">
        <div class="row g-0">
            @if($product->image)
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
            </div>
            @endif
            <div class="{{ $product->image ? 'col-md-8' : 'col-md-12' }}">
                <div class="card-body">
                    <h3 class="card-title text-success">{{ $product->name }}</h3>
                    <p class="card-text">{{ $product->description }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</li>
                        <li class="list-group-item"><strong>Stock:</strong> {{ $product->stock }}</li>
                        <li class="list-group-item"><strong>Categoría:</strong> {{ $product->category->name ?? 'Sin categoría' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('products.index') }}" class="btn btn-outline-success">
            <i class="fas fa-arrow-left"></i> Volver a la lista
        </a>
        <div>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection