@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Notificación</h1>

    <form action="{{ route('notifications.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="Title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="Description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Entrenador</label>
            <select name="trainer_id" class="form-select" required>
                <option value="">Seleccione un entrenador</option>
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
