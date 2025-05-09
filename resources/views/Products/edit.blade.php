@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Actualizar Producto</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Columna izquierda -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" name="name" id="name" 
                                   value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" name="description" id="description" 
                                      rows="3">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="price" class="form-label">Precio</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" name="price" id="price" 
                                           value="{{ old('price', $product->price) }}" step="0.01" min="0" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="quantity_available" class="form-label">Stock en Inventario</label>
                                <input type="number" class="form-control" name="quantity_available" 
                                       value="{{ old('quantity_available', $product->inventory->quantity_available ?? 0) }}" 
                                       min="0" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Categoría</label>
                            <select class="form-select" name="category_id" id="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Columna derecha -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="current_image" class="form-label">Imagen Actual</label>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="img-thumbnail d-block mb-2" 
                                     style="max-height: 200px">
                            @else
                                <p class="text-muted">No hay imagen actual</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Nueva Imagen (Opcional)</label>
                            <input type="file" class="form-control" name="image" id="image" 
                                   accept="image/jpeg,image/png,image/jpg,image/gif">
                            <div class="form-text">Reemplazará la imagen actual. Formatos: JPEG, PNG, JPG, GIF (Max. 2MB)</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Actualizar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-label {
        font-weight: 500;
    }
    .img-thumbnail {
        background-color: #f8f9fa;
        border: 1px dashed #dee2e6;
    }
</style>
@endsection