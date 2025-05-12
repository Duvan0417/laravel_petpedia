@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Actualizar Foro</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('forums.update', $forum) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Foro</label>
                            <input type="text" class="form-control" name="name" id="name" 
                                   value="{{ old('name', $forum->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" name="description" id="description" 
                                      rows="3" required>{{ old('description', $forum->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="date" 
                            value="{{ old('date', \Carbon\Carbon::parse($forum->date)->format('Y-m-d')) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Creador</label>
                            <select class="form-select" name="user_id" id="user_id">
                                <option value="">Seleccione un usuario</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" 
                                        {{ $forum->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('forums.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Actualizar Foro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-label {
        font-weight: 500;
    }
</style>
@endsection