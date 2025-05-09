@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Producto</h2>

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <!-- Columna izquierda - Datos principales -->
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="table-success">ID</th>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <th class="table-success">Nombre</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th class="table-success">Descripción</th>
                                    <td>{{ $product->description ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="table-success">Precio</th>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <th class="table-success">Stock en Inventario</th>
                                    <td class="{{ $product->inventory->quantity_available <= ($product->inventory->min_stock ?? 5) ? 'text-danger fw-bold' : '' }}">
                                        {{ $product->inventory->quantity_available ?? 0 }}
                                        @if($product->inventory->quantity_available <= ($product->inventory->min_stock ?? 5))
                                            <small class="text-muted">(Stock mínimo: {{ $product->inventory->min_stock ?? 5 }})</small>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-success">Categoría</th>
                                    <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Columna derecha - Imagen -->
                <div class="col-md-6">
                    @if($product->image)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/'.$product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="img-fluid rounded shadow-sm"
                             style="max-height: 300px;">
                        <p class="mt-2 text-muted">Imagen actual del producto</p>
                    </div>
                    @else
                    <div class="text-center py-4 bg-light rounded">
                        <i class="bi bi-image text-secondary" style="font-size: 5rem;"></i>
                        <p class="mt-2 text-muted">Este producto no tiene imagen</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Acciones -->
            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al listado
                </a>
                <div>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary me-2">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('¿Eliminar este producto y su registro de inventario?')">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table th {
        width: 30%;
    }
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
</style>
@endsection