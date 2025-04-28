@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Agregar Nuevo Producto</h2>
        
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            
            <!-- Sección de información básica -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label for="name" class="block text-gray-900 font-semibold mb-2">Nombre del Producto*</label>
                    <input type="text" id="name" name="name" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                </div>
                
                <div>
                    <label for="price" class="block text-gray-900 font-semibold mb-2">Precio*</label>
                    <input type="number" step="0.01" id="price" name="price" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                </div>
                
                <div>
                    <label for="stock" class="block text-gray-900 font-semibold mb-2">Stock Disponible*</label>
                    <input type="number" id="stock" name="stock" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                </div>
                
                <div>
                    <label for="image" class="block text-gray-900 font-semibold mb-2">Imagen del Producto*</label>
                    <input type="file" id="image" name="image" accept="image/*" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 text-gray-900">
                </div>
            </div>
            
            <!-- Sección de categorías -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Categorías</h3>
                
                <div class="mb-6">
                    <label class="block text-gray-900 font-semibold mb-2">Seleccione categorías*</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach($categories as $category)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                   class="rounded text-blue-600 focus:ring-blue-500">
                            <span class="text-gray-900">{{ $category->name }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                
                <div>
                    <label for="main_category" class="block text-gray-900 font-semibold mb-2">Categoría Principal*</label>
                    <select id="main_category" name="main_category" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                        <option value="">Seleccione una categoría principal</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" class="text-gray-900">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <!-- Botones de acción -->
            <div class="flex justify-end space-x-4">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-md">
                    Guardar Producto
                </button>
                <a href="{{ route('products.index') }}" class="px-6 py-3 bg-gray-200 text-gray-900 font-semibold rounded-lg hover:bg-gray-300 transition duration-200">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection