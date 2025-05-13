@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Respuesta</h1>

    <form action="{{ route('answers.update', $answer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Contenido</label>
            <textarea name="content" class="form-control" required>{{ old('content', $answer->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Fecha de Creación</label>
            <input type="date" name="creation_date" class="form-control" value="{{ old('creation_date', $answer->creation_date) }}" required>
        </div>

        <div class="mb-3">
            <label>Tema</label>
            <select name="topic_id" class="form-control" required>
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}" {{ $answer->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Usuario</label>
            <select name="users_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $answer->users_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('answers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
