@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Veterinario</h1>
    <form action="{{ route('veterinarians.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">Dirección:</label>
            <textarea class="form-control" name="address" required></textarea>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="form-group">
            <label for="hours">Horas:</label>
            <input type="text" class="form-control" name="hours" required>
        </div>
        <div class="form-group">
            <label for="services_offered">Servicios Ofrecidos:</label>
            <textarea class="form-control" name="services_offered" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('veterinarians.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
