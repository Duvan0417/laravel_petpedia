@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5">Editar Tipo</h1>
    <form action="{{ route('types.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value="{{ $type->name }}" required>
        </div>
        <div class="form-group">
            <label for="category">Categoría:</label>
            <input type="text" class="form-control" name="category" value="{{ $type->category }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('types.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
