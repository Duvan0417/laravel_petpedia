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
                            <label for="title" class="form-label">Título del Temas</label>
                            <input type="text" class="form-control" name="title" id="title" 
                                   value="{{ old('title', $topic->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" name="description" id="description" 
                                      rows="3">{{ old('description', $topic->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="creation_date" class="form-label">Fecha de creacion </label>
                            <input type="date" class="form-control" name="create_date" 
                            value="{{ old('date', \Carbon\Carbon::parse($topic->forum->date ?? now())->format('Y-m-d')) }}" required>
                            
                        </div>

                        <div class="mb-3">
                            <label for="forum_id" class="form-label">Foro</label>
                            <select class="form-select" name="forum_id" id="forum_id" required>
                                @foreach($forums as $forum)
                                    <option value="{{ $forum->id }}" 
                                        {{ $topic->forum_id == $forum->id ? 'selected' : '' }}>
                                        {{ $forum->name }}
                                    </option>
                                @endforeach
                            </select>
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