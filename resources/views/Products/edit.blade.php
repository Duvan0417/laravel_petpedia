@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Producto</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl bg-white rounded-lg shadow-md p-6">
        @csrf
        @method('PUT')
        
        <!-- Información básica del producto -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Nombre del Producto*</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required 
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-medium mb-2">Precio*</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ $product->price }}" required 
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-medium mb-2">Cantidad en Stock*</label>
            <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required 
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Imagen Actual</label>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                     class="w-32 h-32 object-cover rounded-lg border mb-2">
            @else
                <p class="text-gray-500">No hay imagen actual</p>
            @endif
        </div>
        
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium mb-2">Nueva Imagen</label>
            <input type="file" id="image" name="image" 
                   class="w-full px-4 py-2 border rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-50 file:text-blue-700">
        </div>
        
        <!-- Selección de categorías -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Categorías*</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @foreach($categories as $category)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                           {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}
                           class="rounded text-blue-500 focus:ring-blue-500">
                    <span>
                        {{ $category->name }}
                        @if($product->categories->where('id', $category->id)->first()?->pivot->is_principal)
                            <span class="ml-2 px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">Principal</span>
                        @endif
                    </span>
                </label>
                @endforeach
            </div>
        </div>
        
        <!-- Selección de categoría principal -->
        <div class="mb-6">
            <label for="main_category" class="block text-gray-700 font-medium mb-2">Categoría Principal*</label>
            <select id="main_category" name="main_category" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Seleccione una categoría principal</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ $product->categories->where('pivot.is_principal', true)->first()?->id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        
        <div class="flex space-x-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                Actualizar Producto
            </button>
            <a href="{{ route('products.index') }}" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-200">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection