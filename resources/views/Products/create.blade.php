@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Nuevo Producto</h2>
    
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Producto</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="price" class="form-label">Precio</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" min="0" required>
                </div>
            </div>

            <!-- Sección ELIMINADA: Campo stock -->
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="" selected disabled>Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nuevo campo para cantidad inicial del inventario -->
        <div class="mb-3">
            <label for="initial_quantity" class="form-label">Cantidad Inicial en Inventario</label>
            <input type="number" id="initial_quantity" name="initial_quantity" class="form-control" min="0" value="0" required>
            <div class="form-text">Esta cantidad se registrará en el módulo de inventario</div>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label">Imagen del Producto</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
            <div class="form-text">Formatos aceptados: JPEG, PNG, JPG, GIF (Max. 2MB)</div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary me-md-2">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar Producto</button>
        </div>
    </form>
</div>

<style>
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .form-control, .form-select {
        border-radius: 0.375rem;
    }
</style>
@endsection