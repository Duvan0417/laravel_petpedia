@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Notificación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('notifications.update', $notification->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="Title" class="form-control" value="{{ old('Title', $notification->Title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="Description" class="form-control" rows="4" required>{{ old('Description', $notification->Description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Entrenador</label>
            <select name="trainer_id" class="form-select" required>
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}" {{ $notification->trainer_id == $trainer->id ? 'selected' : '' }}>
                        {{ $trainer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
