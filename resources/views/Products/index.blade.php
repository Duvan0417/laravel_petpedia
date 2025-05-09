@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nuevo Producto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th width="5%">ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th colspan="3" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="img-thumbnail" 
                                     style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        
                        <!-- Sección de Stock Mejorada -->
                        <td class="{{ $product->inventory->quantity_available <= ($product->inventory->min_stock ?? 5) ? 'text-danger fw-bold' : '' }}">
                            {{ $product->inventory->quantity_available ?? 0 }}
                            @if($product->inventory->quantity_available <= ($product->inventory->min_stock ?? 5))
                                <small class="text-muted d-block">(Mín: {{ $product->inventory->min_stock ?? 5 }})</small>
                            @endif
                        </td>
                        
                        <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                        
                        <!-- Acciones -->
                        <td class="text-center">
                            <a href="{{ route('products.show', $product->id) }}" 
                               class="btn btn-sm btn-info" 
                               title="Ver detalles"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                        
                        <td class="text-center">
                            <a href="{{ route('products.edit', $product->id) }}" 
                               class="btn btn-sm btn-warning"
                               title="Editar"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        
                        <td class="text-center">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        title="Eliminar"
                                        data-bs-toggle="tooltip"
                                        onclick="return confirm('¿Estás seguro de eliminar este producto? Se eliminará también su registro de inventario.')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">No hay productos registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    @if($products->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
    @endif
</div>

<style>
    .table th {
        vertical-align: middle;
        white-space: nowrap;
    }
    .img-thumbnail {
        padding: 0;
        background-color: #f8f9fa;
    }
    .badge-stock {
        font-size: 0.85em;
    }
</style>

@push('scripts')
<script>
    // Activar tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
@endsection