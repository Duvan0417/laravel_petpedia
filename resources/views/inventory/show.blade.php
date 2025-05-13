@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalles del Inventario</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Información Básica</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Producto:</strong> 
                            {{ $inventory->product->name ?? 'No asignado' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Cantidad Disponible:</strong> 
                            <span class="badge bg-{{ $inventory->quantity_available > 0 ? 'success' : 'danger' }}">
                                {{ $inventory->quantity_available }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <strong>Última Actualización:</strong> 
                            {{ $inventory->updated_at->format('d/m/Y H:i') }}
                        </li>
                    </ul>
                </div>
                
                <div class="col-md-6">
                    <h5>Acciones Rápidas</h5>
                    <div class="d-grid gap-2">
                        <a href="{{ route('inventory.edit', $inventory->id) }}" 
                           class="btn btn-warning btn-lg">
                           <i class="fas fa-edit"></i> Editar Inventario
                        </a>
                        
                        <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg w-100"
                                    onclick="return confirm('¿Eliminar permanentemente este registro?')">
                                <i class="fas fa-trash-alt"></i> Eliminar Registro
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('inventory.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
@endsection