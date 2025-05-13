@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Nuevo Tema</h2>
    
    <form action="{{ route('topics.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Título del Tema</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="creation_date" class="form-label">Fecha de Creación</label>
                <input type="date" id="creation_date" name="creation_date" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="forum_id" class="form-label">Foro</label>
                <select id="forum_id" name="forum_id" class="form-select" required>
                    <option value="" selected disabled>Seleccione un foro</option>
                    @foreach($forums as $forum)
                        <option value="{{ $forum->id }}">{{ $forum->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('topics.index') }}" class="btn btn-outline-secondary me-md-2">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar tema</button>
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