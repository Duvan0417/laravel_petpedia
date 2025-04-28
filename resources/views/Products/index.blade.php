@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Listado de Productos</h1>
        <a href="{{ route('products.create') }}" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200 shadow-md">
            + Nuevo Producto
        </a>
    </div>

    <!-- Grid de productos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-200">
            <!-- Imagen del producto -->
            <div class="h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                     class="w-full h-full object-cover">
            </div>
            
            <!-- Información del producto -->
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-lg font-bold text-gray-900">{{ $product->name }}</h3>
                    <span class="text-lg font-bold text-blue-600">${{ number_format($product->price, 2) }}</span>
                </div>
                
                <p class="text-gray-600 mb-3">{{ $product->description }}</p>
                
                <div class="flex items-center mb-3">
                    <span class="text-sm font-medium {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $product->stock > 0 ? 'En stock: '.$product->stock : 'Agotado' }}
                    </span>
                </div>
                
                <!-- Categorías -->
                <div class="mb-4">
                    @foreach($product->categories as $category)
                    <span class="inline-block px-2 py-1 text-xs font-medium rounded-full mr-1 mb-1 
                              {{ $category->pivot->is_principal ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $category->name }}
                    </span>
                    @endforeach
                </div>
                
                <!-- Botones de acción -->
                <div class="flex justify-between">
                    <a href="{{ route('products.edit', $product->id) }}" 
                       class="px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded hover:bg-yellow-600 transition duration-200">
                        Editar
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded hover:bg-red-600 transition duration-200"
                                onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Paginación -->
    @if($products->hasPages())
    <div class="mt-8">
        {{ $products->links() }}
    </div>
    @endif
</div>
@endsection