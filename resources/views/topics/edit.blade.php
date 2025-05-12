@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Actualizar Tópico</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('topics.update', $topic) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Título del Tópico</label>
                            <input type="text" class="form-control" name="title" id="title" 
                                   value="{{ old('title', $topic->title) }}" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" name="description" id="description" 
                                      rows="3">{{ old('description', $topic->description ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="creation_date" class="form-label">Fecha de creación</label>
                            <input type="date" class="form-control" name="creation_date" id="creation_date"
                            value="{{ old('creation_date', \Carbon\Carbon::parse($topic->creation_date)->format('Y-m-d')) }}" required>
                            @error('creation_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="forum_id" class="form-label">Foro</label>
                            <select class="form-select" name="forum_id" id="forum_id" required>
                                <option value="">Seleccione un foro</option>
                                @foreach($forums as $forum)
                                    <option value="{{ $forum->id }}" 
                                        {{ old('forum_id', $topic->forum_id) == $forum->id ? 'selected' : '' }}>
                                        {{ $forum->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('forum_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('topics.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Actualizar Tópico
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