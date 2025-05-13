@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Refugio</h1>
    <form action="{{ route('shelters.update', $shelter) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value="{{ $shelter->name }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="number" class="form-control" name="phone" value="{{ $shelter->phone }}" required>
        </div>
        <div class="form-group">
            <label for="responsible">Responsable:</label>
            <input type="text" class="form-control" name="responsible" value="{{ $shelter->responsible }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ $shelter->email }}" required>
        </div>
        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" class="form-control" name="address" value="{{ $shelter->address }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('shelters.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
