@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Nuevo Foro</h2>
    
    <form action="{{ route('forums.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Foro</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="user_id" class="form-label">Creador</label>
                <select id="user_id" name="user_id" class="form-select">
                    <option value="" selected>Seleccione un usuario</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('forums.index') }}" class="btn btn-outline-secondary me-md-2">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar Foro</button>
        </div>
    </form>
</div>

<style>
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .form-control, .form-select {
        border-radius: 0.375rem;
    }
</style>
@endsection