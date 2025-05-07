@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5">Agregar Tipo</h1>
    <form action="{{ route('types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="category">Categoría:</label>
            <input type="text" class="form-control" name="category" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('types.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
