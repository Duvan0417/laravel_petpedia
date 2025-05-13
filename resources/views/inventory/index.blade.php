@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registros de Inventario</h2>
    <a href="{{ route('inventory.create') }}" class="btn btn-success mb-3">
        + Nuevo Registro
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad Disponible</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $inventory)
            <tr>
                <td>{{ $inventory->product->name ?? 'Sin producto' }}</td>
                <td>{{ $inventory->quantity_available }}</td>
                <td>
                    <a href="{{ route('inventory.edit', $inventory->id) }}" 
                       class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('inventory.destroy', $inventory->id) }}" 
                          method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Eliminar registro?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection