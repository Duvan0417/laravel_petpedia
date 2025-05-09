@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Veterinario</h1>
    <form action="{{ route('veterinarians.update', $veterinarian) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value="{{ $veterinarian->name }}" required>
        </div>
        <div class="form-group">
            <label for="address">Dirección:</label>
            <textarea class="form-control" name="address" required>{{ $veterinarian->address }}</textarea>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="text" class="form-control" name="phone" value="{{ $veterinarian->phone }}" required>
        </div>
        <div class="form-group">
            <label for="hours">Horas:</label>
            <input type="text" class="form-control" name="hours" value="{{ $veterinarian->hours }}" required>
        </div>
        <div class="form-group">
            <label for="services_offered">Servicios Ofrecidos:</label>
            <textarea class="form-control" name="services_offered" required>{{ $veterinarian->services_offered }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('veterinarians.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
